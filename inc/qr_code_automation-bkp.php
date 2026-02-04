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
    
    // Customize the redirect URL based on your needs
    $redirect_url = home_url('/thank-you/?entry=' . $entry_id);
    
    // Prepare QR code data
    $qr_data = [
        'disabled' => false,
        'code' => $unique_code,
        'description' => 'QR Code for ' . $user_name . ' (Entry #' . $entry_id . ')',
        'url_redirect' => $redirect_url,
        'url_inactive' => '',
        'url_expired' => '',
        'date_from' => '2025-11-26 07:30:00', // Start date (null = immediately active)
        'date_to' => '2025-11-26 17:00:00',   // End date (null = never expires)
        'time_from' => null,
        'time_to' => null,
        'dotw' => 0, // Days of week (0 = all days)
        'priority' => false,
        'max_scan_tot' => 2, // 3 scans limit
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
        // QR code created successfully - send notification email
        send_qr_code_notification($user_email, $user_name, $qr_id, $entry_id, $unique_code);
        
        // Log success
        error_log("QR Code created successfully: ID {$qr_id} for entry {$entry_id}");
    } else {
        // Log error
        error_log("Failed to create QR code for form entry {$entry_id}");
    }
}

// WP Mail SMTP Compatible Version
function send_qr_code_notification($user_email, $user_name, $qr_id, $entry_id, $unique_code) {
    // Test basic functionality first
    wp_mail($user_email, 'QR Code Test', 'This is a test email to verify WP Mail SMTP is working.');
    
    // Generate QR code image file
    $qr_attachment = generate_qr_image_file($qr_id, $unique_code);
    
    if (!$qr_attachment) {
        // Fallback: send email without attachment but with download link
        return send_qr_email_with_link($user_email, $user_name, $qr_id, $entry_id, $unique_code);
    }
    
    // Use PHPMailer directly for better control with WP Mail SMTP
    add_action('phpmailer_init', function($phpmailer) use ($qr_attachment, $unique_code) {
        try {
            if (file_exists($qr_attachment)) {
                $phpmailer->addAttachment($qr_attachment, 'QR_Code_' . $unique_code . '.png', 'base64', 'image/png');
            }
        } catch (Exception $e) {
            error_log('PHPMailer attachment error: ' . $e->getMessage());
        }
    });
    
    // Email subject
    $subject = 'Sua inscrição foi realizada com sucesso!';
    
    // Simpler email content for better compatibility
    $message = '<html><body style="font-family: Arial, sans-serif;">
        <h2>Olá, ' . esc_html($user_name) . '!</h2>

        <p>Agradecemos sua inscrição no 1º Congresso de Proteção de Dados na Administração Pública.</p>

        <p>Seu código QR de acesso está anexado a este e-mail como uma imagem PNG.</p>

        <p><strong>Detalhes da Inscrição:</strong><br>
        ID da Inscrição: ' . $entry_id . '<br>
        QR Code: ' . $unique_code . '</p>

        <p>Por favor, salve a imagem do código QR anexada em seu telefone.</p>

        <p>Atenciosamente,<br>Prefeitura de Itabirito</p>
    </body></html>';
    
    // Simple headers for WP Mail SMTP compatibility
    $headers = array(
        'Content-Type: text/html; charset=UTF-8'
    );
    
    // Send email
    $sent = wp_mail($user_email, $subject, $message, $headers);
    
    // Clean up temporary file
    if (file_exists($qr_attachment)) {
        unlink($qr_attachment);
    }
    
    return $sent;
}

// Fallback function for when attachment fails
function send_qr_email_with_link($user_email, $user_name, $qr_id, $entry_id, $unique_code) {
    // Save QR code image permanently and provide download link
    $qr_image_url = save_qr_image_permanently($qr_id, $unique_code);
    
    if (!$qr_image_url) {
        return false;
    }
    
    $subject = 'Sua inscrição está confirmada - #' . $entry_id;
    
    $message = '<html><body style="font-family: Arial, sans-serif;">
        <h2>Olá, ' . esc_html($user_name) . '!</h2>

        <p>Agradecemos sua inscrição no 1º Congresso de Proteção de Dados na Administração Pública.</p>

        <p>Seu código QR de acesso está pronto.</p>

        <p><img src="' . esc_url($qr_image_url) . '" alt="QR Code" style="max-width: 100%; height: auto;"></p>

        <p><a href="' . $qr_image_url . '" style="background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Baixar Seu Código QR</a></p>

        <p>Ou copie este link: ' . $qr_image_url . '</p>

        <p><strong>Detalhes da Inscrição:</strong><br>
        ID da Inscrição: ' . $entry_id . '<br></p>

        <p>Atenciosamente,<br>Prefeitura de Itabirito</p>
    </body></html>';
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    return wp_mail($user_email, $subject, $message, $headers);
}

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

function generate_qr_image_file($qr_id, $unique_code) {
    try {
        error_log("Generating QR image for ID: {$qr_id}");
        
        // Get plugin instance
        $plugin = SOSIDEE_DYNAMIC_QRCODE\SosPlugin::instance();
        
        // Load QR code from database
        $qrcode = $plugin->database->loadQrCode($qr_id);
        if (!$qrcode) {
            error_log("Could not load QR code from database: {$qr_id}");
            return false;
        }
        
        error_log("Loaded QR code data: " . print_r($qrcode, true));
        
        // Get the API URL that the QR code will contain
        $api_url = $plugin->getApiUrl($qrcode->code, false);
        error_log("API URL for QR: {$api_url}");
        
        // QR code settings
        $size = 300;  // Larger size for better quality
        $padding = 4;
        
        // Generate QR code using plugin's method
        $fore_color = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getColor('#000000');
        $back_color = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getColor('#ffffff');
        
        // This generates base64 encoded PNG data
        $base64_data = SOSIDEE_DYNAMIC_QRCODE\SRC\QrCode::getString($api_url, $size, $padding, $fore_color, $back_color);
        
        if (!$base64_data) {
            error_log("Failed to generate QR code base64 data");
            return false;
        }
        
        error_log("Generated base64 data length: " . strlen($base64_data));
        
        // Create temp file
        $upload_dir = wp_upload_dir();
        if (!$upload_dir || isset($upload_dir['error'])) {
            error_log("Could not get upload directory");
            return false;
        }
        
        $filename = 'qr_' . $unique_code . '_' . time() . '.png';
        $filepath = $upload_dir['path'] . '/' . $filename;
        
        // Convert base64 to binary and save
        $binary_data = base64_decode($base64_data);
        $bytes_written = file_put_contents($filepath, $binary_data);
        
        if ($bytes_written === false) {
            error_log("Failed to write QR image file: {$filepath}");
            return false;
        }
        
        error_log("QR image saved: {$filepath} ({$bytes_written} bytes)");
        
        // Verify file exists and has content
        if (!file_exists($filepath) || filesize($filepath) == 0) {
            error_log("QR image file verification failed");
            return false;
        }
        
        return $filepath;
        
    } catch (Exception $e) {
        error_log("Exception in generate_qr_image_file: " . $e->getMessage());
        return false;
    }
}

// Optional: Add admin notification
function send_admin_qr_notification($qr_id, $entry_id, $user_email) {
    $admin_email = get_option('admin_email');
    $subject = 'New QR Code Generated - Entry #' . $entry_id;
    
    $message = "
    A new QR code has been generated:
    
    Entry ID: {$entry_id}
    QR Code ID: {$qr_id}
    User Email: {$user_email}
    
    You can manage this QR code in the WordPress admin panel.
    ";
    
    wp_mail($admin_email, $subject, $message);
}

?>