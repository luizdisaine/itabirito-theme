<?php
/**
 * Check for theme updates from a GitHub repository.
 *
 * @package Itabirito_Theme
 */
function check_theme_update() {
    $url = 'https://github.com/luizdisaine/itabirito-theme.git';
    $response = wp_remote_get( $url );
    if( is_array( $response ) ) {
        $version = $response['body'];
        // Compare the version number with the current version of your theme
        if( version_compare( $version, '1.0.0', '>' ) ) {
            // Update is available
            // Add a notice to the WordPress admin dashboard
            add_action( 'admin_notices', 'show_theme_update_notice' );
        }
    }
}

add_action( 'after_setup_theme', 'check_theme_update' );

function show_theme_update_notice() {
    ?>
    <div class="notice notice-warning">
        <p><?php _e( 'A new version of the theme is available. Please update as soon as possible.', 'pmi' ); ?></p>
    </div>
    <?php
}

?>