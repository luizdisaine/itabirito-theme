<?php
/*
Template Name: QR Code Verification - Admin Page
Description: Admin-only page to verify physical attendance and update QR code scan status
*/

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit('Direct access not allowed');
}

// Check admin permissions
if (!current_user_can('manage_options')) {
    wp_die('You do not have permission to access this page.');
}

get_header();

// Get parameters
$entry_id = isset($_GET['entry']) ? sanitize_text_field($_GET['entry']) : '';
$code = isset($_GET['code']) ? sanitize_text_field($_GET['code']) : '';

// Check verification status and get QR data
$is_verified = false;
$scan_count = 0;
$qr_status = 'Not Found';
$qr_data = null;
$message = '';
$verification_time = '';

if (!empty($entry_id) && !empty($code)) {
    global $wpdb;
    
    // Get QR code info from plugin database
    $qr_table = $wpdb->prefix . 'sos_dqc_qrcodes';
    $log_table = $wpdb->prefix . 'sos_dqc_logs';
    
    $qr_data = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$qr_table} WHERE code = %s AND cancelled = 0",
        $code
    ));
    
    if ($qr_data) {
        // Count current scans
        $scan_count = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$log_table} WHERE qrcode_id = %d AND cancelled = 0",
            $qr_data->qrcode_id
        ));
        
        // Check WordPress verification status
        $verification_key = 'cpdap_verified_' . $entry_id . '_' . md5($code);
        $verification_data = get_option($verification_key, false);
        $is_verified = !empty($verification_data);
        
        if (is_array($verification_data) && isset($verification_data['verified_at'])) {
            $verification_time = $verification_data['verified_at'];
        }
        
        // Determine QR status
        if ($qr_data->disabled) {
            $qr_status = 'Disabled';
        } else if ($qr_data->max_scan_tot > 0 && $scan_count >= $qr_data->max_scan_tot) {
            $qr_status = 'Limit Reached';
        } else if ($scan_count > 0) {
            $qr_status = 'Scanned';
        } else {
            $qr_status = 'Active';
        }
    }
}

// Handle form submission for verification
if ($_POST['action'] === 'verify_attendance' && !empty($entry_id) && !empty($code) && $qr_data && !$is_verified) {
    
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['verify_nonce'], 'verify_attendance_' . $entry_id)) {
        $message = 'Security check failed. Please try again.';
    } else {
        // Step 1: Add scan log entry to Dynamic QR Code plugin
        $current_user = wp_get_current_user();
        
        $log_data = array(
            'status' => 1, // Success status
            'code' => $code,
            'qrcode_id' => $qr_data->qrcode_id,
            'user_key' => 'admin_verification',
            'event_id' => 'cpdap_' . $entry_id,
            'op_sys' => 0, // Unknown OS
            'dev_type' => 0, // Unknown device type
            'lang' => '',
            'country' => '',
            'region' => '',
            'city' => '',
            'creation' => current_time('mysql'),
            'cancelled' => 0
        );
        
        $log_inserted = $wpdb->insert($log_table, $log_data);
        
        if ($log_inserted) {
            // Step 2: Store verification in WordPress options
            $verification_data = array(
                'verified_at' => current_time('mysql'),
                'verified_by' => $current_user->display_name,
                'admin_id' => $current_user->ID,
                'entry_id' => $entry_id,
                'code' => $code,
                'log_id' => $wpdb->insert_id
            );
            
            $verification_key = 'cpdap_verified_' . $entry_id . '_' . md5($code);
            $verification_stored = update_option($verification_key, $verification_data);
            
            if ($verification_stored) {
                $message = 'Attendance verified successfully! The QR code status has been updated.';
                $is_verified = true;
                $verification_time = $verification_data['verified_at'];
                $scan_count++; // Increment for display
                
                // Update QR status
                if ($qr_data->max_scan_tot > 0 && $scan_count >= $qr_data->max_scan_tot) {
                    $qr_status = 'Limit Reached';
                } else {
                    $qr_status = 'Scanned';
                }
            } else {
                $message = 'Error storing verification data. Please try again.';
            }
        } else {
            $message = 'Error updating QR code scan status. Please try again.';
        }
    }
}
?>

<style>
    .admin-verify-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 40px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .admin-verify-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        padding: 40px;
    }
    
    .admin-header {
        text-align: center;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 3px solid #3498db;
    }
    
    .admin-header h1 {
        color: #2c3e50;
        font-size: 2.2em;
        margin-bottom: 10px;
    }
    
    .admin-header .subtitle {
        color: #7f8c8d;
        font-size: 1.1em;
    }
    
    .alert {
        padding: 20px;
        border-radius: 8px;
        margin: 20px 0;
        font-weight: 500;
    }
    
    .alert-success {
        background: linear-gradient(135deg, #d1e7dd, #a8e6cf);
        color: #0f5132;
        border-left: 5px solid #198754;
    }
    
    .alert-error {
        background: linear-gradient(135deg, #f8d7da, #fab1a0);
        color: #842029;
        border-left: 5px solid #dc3545;
    }
    
    .info-card {
        background: #f8f9fa;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        padding: 25px;
        margin: 25px 0;
    }
    
    .info-card h3 {
        color: #495057;
        margin-bottom: 15px;
        font-size: 1.3em;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-label {
        font-weight: 600;
        color: #495057;
    }
    
    .info-value {
        color: #6c757d;
    }
    
    .status-verified {
        color: #198754;
        font-weight: bold;
    }
    
    .status-pending {
        color: #fd7e14;
        font-weight: bold;
    }
    
    .verification-section {
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        border: 2px solid #2196f3;
        border-radius: 12px;
        padding: 30px;
        margin: 30px 0;
        text-align: center;
    }
    
    .verification-section h3 {
        color: #1565c0;
        margin-bottom: 20px;
        font-size: 1.4em;
    }
    
    .warning-text {
        background: #fff3cd;
        color: #856404;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        border-left: 4px solid #ffc107;
    }
    
    .verify-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 15px 35px;
        border: none;
        border-radius: 50px;
        font-size: 1.1em;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }
    
    .verify-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
    }
    
    .already-verified {
        background: linear-gradient(135deg, #d1e7dd, #a8e6cf);
        color: #0f5132;
        border: 2px solid #198754;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        margin: 25px 0;
    }
    
    .security-features {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin: 25px 0;
    }
    
    .security-features h4 {
        color: #495057;
        margin-bottom: 15px;
    }
    
    .security-features ul {
        color: #6c757d;
        line-height: 1.6;
        margin: 0;
        padding-left: 20px;
    }
    
    @media (max-width: 768px) {
        .admin-verify-container {
            margin: 20px 10px;
        }
        
        .admin-verify-card {
            padding: 20px;
        }
        
        .admin-header h1 {
            font-size: 1.8em;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .info-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }
    }
</style>

<div class="admin-verify-container">
    <div class="admin-verify-card">
        <div class="admin-header">
            <h1>🛡️ <?php _e('Painel de Verificação do Administrador','itabirito'); ?></h1>
        </div>
        
        <?php if (!empty($message)): ?>
            <div class="alert <?php echo strpos($message, 'successfully') !== false ? 'alert-success' : 'alert-error'; ?>">
                <?php echo esc_html($message); ?>
            </div>
        <?php endif; ?>
        
        <?php if (empty($entry_id) || empty($code)): ?>
            <div class="alert alert-error">
                <h3>❌ <?php _e('Solicitação Inválida','itabirito'); ?></h3>
                <p><?php _e('Parâmetros obrigatórios ausentes. Por favor, use um link de verificação válido.','itabirito'); ?></p>
            </div>
        <?php elseif (!$qr_data): ?>
            <div class="alert alert-error">
                <h3>❌ <?php _e('Código QR Não Encontrado','itabirito'); ?></h3>
                <p><?php _e('Este código QR não foi encontrado na base de dados do plugin Dynamic QR Code.','itabirito'); ?></p>
            </div>
        <?php else: ?>
            
            <div class="info-card">
                <h3>📋 <?php _e('Solicitação de Verificação de Presença','itabirito'); ?></h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label"><?php _e('ID da inscrição:','itabirito'); ?></span>
                        <span class="info-value"><?php echo esc_html($entry_id); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">QR Code:</span>
                        <span class="info-value"><?php echo esc_html($code); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">QR Status:</span>
                        <span class="info-value"><?php echo esc_html($qr_status); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><?php _e('Contagem de scans:'); ?></span>
                        <span class="info-value"><?php echo esc_html($scan_count); ?> / <?php echo esc_html($qr_data->max_scan_tot); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label"><?php _e('Status da verificação','itabirito'); ?></span>
                        <span class="<?php echo $is_verified ? 'status-verified' : 'status-pending'; ?>">
                            <?php echo $is_verified ? '✅ Confirmada' : '⏳ Pendente'; ?>
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Timestamp:</span>
                        <span class="info-value"><?php echo current_time('Y-m-d H:i:s'); ?></span>
                    </div>
                </div>
                <?php if ($is_verified && $verification_time): ?>
                    <div class="info-item">
                        <span class="info-label">Verified At:</span>
                        <span class="info-value status-verified"><?php echo esc_html($verification_time); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php if (!$is_verified): ?>
                <div class="verification-section">
                    <h3>🎯 <?php _e('Verificar Presença Física','itabirito'); ?></h3>
                    
                    <div class="warning-text">
                        <strong>⚠️ <?php _e('Importante:','itabirito'); ?></strong><?php _e('Apenas clique no botão de confirmação se a pessoa estiver presente ao evento. Esta ação vai:','itabirito'); ?>
                        <ul style="text-align: left; margin: 10px 0; padding-left: 20px;">
                            <li><strong><?php _e('Adicionar uma entrada de verificação ao plugin Dynamic QR Code','itabirito'); ?></strong></li>
                            <li><?php _e('Atualizar a contagem de escaneamentos do código QR','itabirito'); ?></li>
                            <li><?php _e('Marcar a presença como verificada no WordPress','itabirito'); ?></li>
                            <li><?php _e('Tornar a pessoa elegível para seu certificado','itabirito'); ?></li>
                            <li><strong><?php _e('Não pode ser desfeito','itabirito'); ?></strong></li>
                        </ul>
                    </div>
                    
                    <form method="post" onsubmit="return confirm('⚠️ CONFIRM VERIFICATION\n\nEntry ID: <?php echo esc_js($entry_id); ?>\nQR Code: <?php echo esc_js($code); ?>\n\nAre you absolutely certain that this person is physically present at the event?\n\nThis will update both the Dynamic QR Code plugin and WordPress verification status.\n\nProceed with verification?');">
                        <?php wp_nonce_field('verify_attendance_' . $entry_id, 'verify_nonce'); ?>
                        <input type="hidden" name="action" value="verify_attendance">
                        
                        <button type="submit" class="verify-btn">
                            ✅ <?php _e('Confirmar presença & atualizar o status do QR'); ?>
                        </button>
                    </form>
                    
                    <!--div style="margin-top: 20px; color: #6c757d; font-size: 0.9em;">
                        <strong>What happens when you verify:</strong><br>
                        1. QR code scan count increases in Dynamic QR Code plugin<br>
                        2. Attendance marked as verified in WordPress<br>
                        3. User receives immediate status update<br>
                        4. Certificate eligibility granted<br>
                        5. QR code may reach scan limit and become "used"
                    </!--div-->
                </div>
            <?php else: ?>
                <div class="already-verified">
                    <h3>✅ <?php _e('Presença já confirmada'); ?></h3>
                    <p><?php _e('A presença do inscrito já foi confirmada e gravada em ambos os sistemas.','itabirito'); ?></p>
                    <p><strong>Status:</strong><?php _e('Elegível para certificado','itabirito'); ?></p>
                    <?php if ($verification_time): ?>
                        <p><strong><?php ?>Verified:</strong> <?php echo esc_html($verification_time); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <!--div class="security-features">
                <h4>🔒 Integration Features</h4>
                <ul>
                    <li>✓ Updates Dynamic QR Code plugin scan logs</li>
                    <li>✓ Maintains WordPress verification records</li>
                    <li>✓ Real-time status synchronization</li>
                    <li>✓ Admin-only access control</li>
                    <li>✓ Nonce security verification</li>
                    <li>✓ Immutable audit trail</li>
                </ul>
            </!--div-->
            
        <?php endif; ?>
        
        <div style="margin-top: 40px; padding-top: 20px; border-top: 2px solid #dee2e6; text-align: center; color: #6c757d; font-size: 0.9em;">
            <strong>CPDAP Admin Panel</strong><br>
            <small>Integrated with Dynamic QR Code Plugin • WordPress Verification System</small>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.admin-verify-card');
    container.style.opacity = '0';
    container.style.transform = 'translateY(30px)';
    
    setTimeout(function() {
        container.style.transition = 'all 0.8s ease';
        container.style.opacity = '1';
        container.style.transform = 'translateY(0)';
    }, 100);
});
</script>

<?php get_footer(); ?>