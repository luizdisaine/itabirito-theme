<?php
/*
Template Name: QR Code Verification - User Page
Description: User-facing page to check QR code verification status
*/

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit('Direct access not allowed');
}

get_header();

// Get parameters
$entry_id = isset($_GET['entry']) ? sanitize_text_field($_GET['entry']) : '';
$code = isset($_GET['code']) ? sanitize_text_field($_GET['code']) : '';

// Check verification status from both WordPress options and Dynamic QR Code plugin
$is_verified = false;
$scan_count = 0;
$qr_status = 'Not Found';
$qr_data = null;
$verification_time = '';

if (!empty($entry_id) && !empty($code)) {
    // Check WordPress verification status
    $verification_key = 'cpdap_verified_' . $entry_id . '_' . md5($code);
    $verification_data = get_option($verification_key, false);
    $is_verified = !empty($verification_data);
    
    if (is_array($verification_data) && isset($verification_data['verified_at'])) {
        $verification_time = $verification_data['verified_at'];
    }
    
    // Check Dynamic QR Code plugin database for scan status
    global $wpdb;
    
    // Get QR code info from plugin database
    $qr_table = $wpdb->prefix . 'sos_dqc_qrcodes';
    $log_table = $wpdb->prefix . 'sos_dqc_logs';
    
    $qr_data = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$qr_table} WHERE code = %s AND cancelled = 0",
        $code
    ));
    
    if ($qr_data) {
        // Count scans for this QR code
        $scan_count = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$log_table} WHERE qrcode_id = %d AND cancelled = 0",
            $qr_data->qrcode_id
        ));
        
        // Determine status based on Dynamic QR Code plugin logic
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
?>

<style>
    .qr-verify-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 40px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .qr-verify-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 40px;
        text-align: center;
    }
    
    .qr-verify-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 3px solid #3498db;
    }
    
    .qr-verify-header h1 {
        color: #2c3e50;
        font-size: 2.2em;
        margin-bottom: 10px;
    }
    
    .qr-verify-header .subtitle {
        color: #7f8c8d;
        font-size: 1.1em;
    }
    
    .status-section {
        margin: 30px 0;
        padding: 25px;
        border-radius: 12px;
        font-size: 1.1em;
    }
    
    .status-verified {
        background: linear-gradient(135deg, #d1e7dd, #a8e6cf);
        color: #0f5132;
        border-left: 5px solid #198754;
    }
    
    .status-pending {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        color: #856404;
        border-left: 5px solid #ffc107;
    }
    
    .status-error {
        background: linear-gradient(135deg, #f8d7da, #fab1a0);
        color: #842029;
        border-left: 5px solid #dc3545;
    }
    
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    
    .info-item {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
    }
    
    .info-label {
        font-weight: 600;
        color: #495057;
        display: block;
        margin-bottom: 8px;
    }
    
    .info-value {
        color: #6c757d;
        font-size: 1.1em;
    }
    
    .refresh-notice {
        background: #e3f2fd;
        color: #1565c0;
        padding: 15px;
        border-radius: 8px;
        margin: 20px 0;
        font-style: italic;
    }
    
    .error-message {
        color: #dc3545;
        font-size: 1.1em;
        margin: 20px 0;
    }
    
    @media (max-width: 768px) {
        .qr-verify-container {
            margin: 20px 10px;
        }
        
        .qr-verify-card {
            padding: 20px;
        }
        
        .qr-verify-header h1 {
            font-size: 1.8em;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="qr-verify-container">
    <div class="qr-verify-card">
        <div class="qr-verify-header">
            <h2>🎓 <?php _e('Verificação de presença','itabirito'); ?></h2>
        </div>
        
        <?php if (empty($entry_id) || empty($code)): ?>
            <div class="status-section status-error">
                <h3>❌ <?php _e('Solicitação inválida','itabirito'); ?></h3>
                <p><?php _e('Parâmetros obrigatórios ausentes. Por favor, use o código QR fornecido em seu e-mail.','itabirito'); ?></p>
            </div>
        <?php elseif (!$qr_data): ?>
            <div class="status-section status-error">
                <h3>❌ <?php _e('Código QR não encontrado','itabirito'); ?></h3>
                <p><?php _e('Este código QR não foi encontrado em nosso sistema. Por favor, entre em contato com o suporte.','itabirito'); ?></p>
            </div>
        <?php else: ?>
            
            <?php if ($is_verified): ?>
                <div class="status-section status-verified">
                    <h3>✅ <?php _e('Presença Verificada','itabirito'); ?></h3>
                    <p><strong><?php _e('Parabéns!','itabirito'); ?></strong> <?php _e('Sua presença foi verificada por um administrador.','itabirito'); ?></p>
                    <p><strong><?php _e('Status:','itabirito'); ?></strong> <?php _e('Elegível para Certificado','itabirito'); ?></p>
                    <?php if ($verification_time): ?>
                        <p><small><?php _e('Verificado em:','itabirito'); ?> <?php echo esc_html($verification_time); ?></small></p>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="status-section status-pending">
                    <h3>⏳ <?php _e('Verificação Pendente','itabirito'); ?></h3>
                    <p><?php _e('Seu código QR foi registrado, mas a verificação de presença ainda está pendente.','itabirito'); ?></p>
                    <p><strong><?php _e('Próximas Etapas:','itabirito'); ?></strong> <?php _e('Apresente este código QR a um administrador no evento para verificação.','itabirito'); ?></p>
                </div>
                
                <div class="refresh-notice">
                    📱 <strong><?php _e('Nota:','itabirito'); ?></strong> <?php _e('Esta página será atualizada automaticamente a cada 10 segundos para mostrar o status atualizado após a verificação do administrador.','itabirito'); ?>
                </div>
            <?php endif; ?>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label"><?php _e('ID da inscrição','itabirito'); ?></span>
                    <span class="info-value"><?php echo esc_html($entry_id); ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label"><?php _e('Status do código QR','itabirito') ?></span>
                    <span class="info-value"><?php echo esc_html($qr_status); ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label"><?php _e('Contagem de scans','itabirito') ?></span>
                    <span class="info-value"><?php echo esc_html($scan_count); ?> / <?php echo esc_html($qr_data->max_scan_tot); ?></span>
                </div>
                
                <div class="info-item">
                    <span class="info-label"><?php _e('Status da verificação'); ?></span>
                    <span class="info-value"><?php echo $is_verified ? '✅ Verified' : '⏳ Pending'; ?></span>
                </div>
            </div>
            
            <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 25px 0; text-align: left;">
                <h4 style="color: #495057; margin-bottom: 15px;">📋 <?php _e('Processo de Verificação','itabirito'); ?></h4>
                <ol style="color: #6c757d; line-height: 1.6;">
                    <li><?php _e('Você recebeu este código QR por e-mail após a submissão do formulário','itabirito'); ?></li>
                    <li><?php _e('Apresente seu dispositivo com este código QR a um administrador do evento','itabirito'); ?></li>
                    <li><?php _e('O administrador escaneia/verifica sua presença física','itabirito'); ?></li>
                    <li><?php _e('Seu status é atualizado para "Verificado" e você se torna elegível para o certificado','itabirito'); ?></li>
                    <li><?php _e('O certificado será processado após o evento','itabirito'); ?></li>
                </ol>
            </div>
            
        <?php endif; ?>
        
        <div style="margin-top: 40px; padding-top: 20px; border-top: 2px solid #dee2e6; color: #6c757d; font-size: 0.9em;">
            <small><?php _e('Rastreamento de Presença Digital Seguro • Proteção Contra Fraudes','itabirito'); ?></small>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.qr-verify-card');
    container.style.opacity = '0';
    container.style.transform = 'translateY(30px)';
    
    setTimeout(function() {
        container.style.transition = 'all 0.8s ease';
        container.style.opacity = '1';
        container.style.transform = 'translateY(0)';
    }, 100);
    
    // Auto-refresh if not verified yet
    <?php if (!$is_verified && $qr_data): ?>
    setInterval(function() {
        location.reload();
    }, 10000); // Refresh every 10 seconds
    <?php endif; ?>
});
</script>

<?php get_footer(); ?>