<?php

// Add this to your theme's functions.php or a custom plugin
add_action('wpforms_process_complete', 'create_qr_code_from_form_submission', 10, 4);

function create_qr_code_from_form_submission($fields, $entry, $form_data, $entry_id) {
    // RESTRICT TO SPECIFIC FORM ID - Change this to your form's ID
    $target_form_id = 96335; // Replace with your actual form ID
    if ($form_data['id'] != $target_form_id) {
        return; // Exit if not the target form
    }
    
    // Check if Dynamic QR Code plugin is active
    if (!class_exists('SOSIDEE_DYNAMIC_QRCODE\SosPlugin')) {
        error_log('Dynamic QR Code plugin not found');
        return;
    }
    
    // Get the plugin instance
    $plugin = SOSIDEE_DYNAMIC_QRCODE\SosPlugin::instance();
    
    // If you have specific field IDs, use them:
    $user_email = $fields[7]['value']; // Field ID 7 for email
    $user_name = $fields[1]['value'];  // Field ID 1 for name - verify this is correct
    
    if (empty($user_email)) {
        error_log('No email found in form submission');
        return;
    }
    
    // Create unique code for this user
    $unique_code = 'CPDAP_' . $entry_id . '_' . time();
    
    // Customize the redirect URL - goes to WordPress theme template page
    $redirect_url = home_url('/qr-verify/?entry=' . $entry_id . '&code=' . $unique_code);
    
    // Prepare QR code data - ACTIVE but requires admin verification for scans to count
    $qr_data = [
        'disabled' => false, // ACTIVE - users can scan but only admin scans count
        'code' => $unique_code,
        'description' => '[ADMIN VERIFICATION REQUIRED] QR Code for ' . $user_name . ' (Entry #' . $entry_id . ')',
        'url_redirect' => $redirect_url,
        'url_inactive' => '',
        'url_expired' => '',
        
        // Date/time restrictions for your event
        'date_from' => '2025-09-30 00:00:00',  // Start on Sept 30, 2025
        'date_to' => '2025-12-31 23:59:59',    // Expire on Dec 31, 2025
        'time_from' => '09:00:00',             // Only active from 9 AM
        'time_to' => '17:00:00',               // Only active until 5 PM
        'dotw' => 0, // Days of week (0 = all days)
        'priority' => false,
        'max_scan_tot' => 2, // 2 scans limit
        'url_finished' => '',
        'cypher' => '',
        'url_cypher' => '',
        'only_mfa' => false,
        'device_os' => 0, // 0 = all devices
        'device_lang' => '',
        'img_forecolor' => '#000000',
        'img_backcolor' => '#ffffff'
    ];
    
    // Save the QR code to database
    $qr_id = $plugin->database->saveQrCode($qr_data);
    
    if ($qr_id !== false) {
        // QR code created successfully - send to user immediately
        // Admin verification will happen when QR code is scanned
        send_qr_code_notification($user_email, $user_name, $qr_id, $entry_id, $unique_code);
        
        // Notify admin that new QR code needs verification setup
        send_admin_verification_notification($qr_id, $entry_id, $user_email, $user_name, $unique_code);
        
        // Log success
        error_log("QR Code created (admin verification required): ID {$qr_id} for entry {$entry_id}");
    } else {
        // Log error
        error_log("Failed to create QR code for form entry {$entry_id}");
    }
}

// Updated email notification function
function send_qr_code_notification($user_email, $user_name, $qr_id, $entry_id, $unique_code) {
    // Use the updated email function with proper Portuguese content
    return send_qr_email_with_link($user_email, $user_name, $qr_id, $entry_id, $unique_code);
}

// Email function with QR code image and Portuguese content
function send_qr_email_with_link($user_email, $user_name, $qr_id, $entry_id, $unique_code) {
    // Save QR code image permanently and provide download link
    $qr_image_url = save_qr_image_permanently($qr_id, $unique_code);
    
    if (!$qr_image_url) {
        return false;
    }
    
    $subject = 'Sua inscrição no 1º Congresso de Proteção de Dados na Administração Pública - #' . $entry_id;
    
    $message = '<html><body style="font-family: Arial, sans-serif;">
        <img src="https://itabirito.mg.gov.br/wp-content/uploads/2025/10/congresso-protecao-dados-header.png" style="max-width: 200px; height: auto;">
        <br>
        <h2>Olá, ' . esc_html($user_name) . '!</h2>
        
        <p>Agradecemos sua inscrição no 1º Congresso de Proteção de Dados na Administração Pública!</p>

        <p><strong>Detalhes da sua inscrição:</strong><br>
        Nome: ' . esc_html($user_name) . '<br>
        ID da inscrição: ' . $entry_id . '<br>
        </p>
        
        <p>Seu código QR de acesso está pronto.</p>
        <p><img src="'.$qr_image_url.'" style="max-width: 300px; height: auto;"></p>

        <p>Para baixar a imagem, clique no link abaixo.</p>
        
        <p><a href="' . $qr_image_url . '" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Download do seu código QR</a></p>
        
        <p>Ou copie este link: ' . $qr_image_url . '</p>
        
        <p><strong>IMPORTANTE:</strong> Para validar seu certificado, você deve apresentar este código QR durante o evento para verificação por um administrador.</p>
        
        <p>Nos vemos em novembro!</p>
        <p>Atenciosamente,<br>Prefeitura de Itabirito</p>
        <p><img src="https://itabirito.mg.gov.br/wp-content/uploads/2024/10/brasao-1.webp"></p>
    </body></html>';
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    return wp_mail($user_email, $subject, $message, $headers);
}

// Save QR code image permanently in WordPress uploads
function save_qr_image_permanently($qr_id, $unique_code) {
    try {
        // Get plugin instance
        $plugin = SOSIDEE_DYNAMIC_QRCODE\SosPlugin::instance();
        
        // Load QR code from database
        $qrcode = $plugin->database->loadQrCode($qr_id);
        if (!$qrcode) {
            return false;
        }
        
        // Get the API URL
        $api_url = $plugin->getApiUrl($qrcode->code, false);
        
        // Generate QR code
        $fore_color = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getColor('#000000');
        $back_color = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getColor('#ffffff');
        $base64_data = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getString($api_url, 300, 4, $fore_color, $back_color);
        
        if (!$base64_data) {
            return false;
        }
        
        // Save permanently in uploads
        $upload_dir = wp_upload_dir();
        $filename = 'qr_code_' . $unique_code . '.png';
        $filepath = $upload_dir['path'] . '/' . $filename;
        $fileurl = $upload_dir['url'] . '/' . $filename;
        
        // Save file
        $binary_data = base64_decode($base64_data);
        file_put_contents($filepath, $binary_data);
        
        return $fileurl;
        
    } catch (Exception $e) {
        return false;
    }
}

// Admin notification about new QR code that needs verification capability
function send_admin_verification_notification($qr_id, $entry_id, $user_email, $user_name, $unique_code) {
    $admin_email = get_option('admin_email');
    $subject = 'Novo código QR criado - Verificação pelo administrador necessária - Inscrição #' . $entry_id;
    
    // Updated to use WordPress theme template page
    $verify_url = home_url('/admin-verify/?entry=' . $entry_id . '&code=' . $unique_code . '&admin_key=' . wp_create_nonce('admin_verify_' . $qr_id));
    
    $message = '<html><body style="font-family: Arial, sans-serif;">
        <h2>1º Congresso de Proteção de Dados na Administração Pública</h2>
        <h3>Novo código QR criado - Verificação pelo administrador necessária</h3>
        
        <p>Um novo código QR foi criado e requer <strong>verificação do administrador</strong>:</p>
        
        <p><strong>Detalhes:</strong><br>
        Nome: ' . esc_html($user_name) . '<br>
        Email: ' . esc_html($user_email) . '<br>
        ID da inscrição: ' . $entry_id . '<br>
        ID do QR Code: ' . $qr_id . '<br>
        Código único: ' . $unique_code . '</p>
        
        <p><strong>Como funciona:</strong></p>
        <ul>
            <li>O inscrito recebeu um código QR e pode escaneá-lo</li>
            <li><strong>MAS:</strong> Escaneamentos só contam quando verificados por um administrador</li>
            <li>Quando escaneado, o inscrito vê uma página de verificação</li>
            <li>Você deve verificar a presença dele fisicamente</li>
            <li>Isso previne fraudes nos certificados</li>
        </ul>
        
        <h4><strong>URL de verificação do administrador:</strong></h4>
        <p><a href="' . $verify_url . '" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">PÁGINA DE VERIFICAÇÃO DE PRESENÇA</a></p>
        
        <p>Salve este link para verificar a presença dos inscritos durante o evento!</p>
        
        <p><small>O código QR está ativo mas escaneamentos requerem sua verificação para validar os certificados.</small></p>
    </body></html>';
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    wp_mail($admin_email, $subject, $message, $headers);
}

// WordPress Pages Setup Instructions
// ===================================
// 
// IMPORTANT: You need to create these WordPress pages and templates:
//
// 1. USER VERIFICATION PAGE:
//    - Create WordPress page with slug: "qr-verify" 
//    - Use template: page-qr-verify.php (the one we created earlier)
//
// 2. ADMIN VERIFICATION PAGE:
//    - Create WordPress page with slug: "admin-verify"
//    - Use template: page-admin-verify.php (the one we created earlier)
//
// 3. Make sure your theme templates are in:
//    /wp-content/themes/your-theme/page-qr-verify.php
//    /wp-content/themes/your-theme/page-admin-verify.php
//
// The WordPress theme templates will handle:
// - Reading from Dynamic QR Code plugin database
// - Showing real-time scan status
// - Admin verification with database updates
// - Proper integration between both systems

?>