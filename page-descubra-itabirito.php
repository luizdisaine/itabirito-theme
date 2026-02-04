<?php 
    /**
     * Template Name: Descubra Itabirito
     * 
     * @package Itabirito
     */
    
    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

    global $post;
    
    $children = get_pages( array( 'child_of' => $post->ID, 'hierarchical' => 1, 'sort_order' => 'desc' ) ); 

?>

<div class="container-fluid py-5 parent-menu bg-amarelo">
    <div class="container">
        <div class="row menu-parent">
            <?php               
                if (is_active_sidebar('turismo')) { 
                    echo '<div class="col-lg-6">';
                    do_action('before_sidebar');
                    dynamic_sidebar('turismo');
                    echo '</div>';
                echo '<div class="col-lg-6">';
                } else {
                    echo '<div class="col-lg-12">';
                }

                    if (!wp_is_mobile()) {
                        echo '<ul class="menu-children text-end">';
                        the_content();                
                     
                        wp_list_pages( array(
                            'child_of' => $post->ID, // Only pages that are children of the current page
                            'depth' => 1 ,   // Only show one level of hierarchy
                            'sort_column' => 'post_title',
                            'sort_order' => 'ASC',
                            'title_li'    => ''
                        ));
                        echo '</ul>';
                    } else {
                        wp_nav_menu(
                            array(
                                'depth' => '1',
                                'theme_location' => 'turismo', 
                                'container' => false, 
                                'menu_class' => 'me-auto'
                            )
                        );
                    }
                    echo '</div>';    
                ?>
        </div>
    </div>
</div>

<?php
if (!wp_is_mobile()) {
    get_footer();
} else {
    get_footer('mobile');
}

if (is_page('descubra-itabirito') && wp_is_mobile()) {
    echo '<div class="w-100 position-absolute bottom-0 bg-dark py-1" id="check-pwa"><button id="install-app-button" type="button" class="btn btn-primary btn-sm m-auto">Instalar como app na tela inicial</button></div>';
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkPwa = document.querySelector('#check-pwa');
        if (window.matchMedia('(display-mode: fullscreen)').matches) { 
            // Está rodando como PWA
            //alert('App instalado na tela inicial!');
            checkPwa.style.display = 'none';
        } else {
            // Não está rodando como PWA
            console.log('Not PWA');
            checkPwa.style.display = 'flex';
        }
        window.AddToHomeScreenInstance = window.AddToHomeScreen({
            appName: 'Descubra Itabirito', // Name of the app.
            // Required.
            appNameDisplay: 'fullscreen', // If set to 'standalone' (the default), the app name will be diplayed
            // on it's own, beneath the "Install App" header. If set to 'inline', the
            // app name will be displayed on a single line like "Install MyApp"
            // Optional. Default 'standalone'
            appIconUrl: 'https://itabirito.mg.gov.br/wp-content/uploads/2026/01/descubra-itabirito.png', // App icon link (square, at least 40 x 40 pixels).
            // Required.
            assetUrl: 'https://cdn.jsdelivr.net/gh/philfung/add-to-homescreen@3.5/dist/assets/img/', // Link to directory of library image assets.

            maxModalDisplayCount: 1, // If set, the modal will only show this many times.
            // [Optional] Default: -1 (no limit).  (Debugging: Use this.clearModalDisplayCount() to reset the count)
            displayOptions: {
                showMobile: true,
                showDesktop: false
            }, // show on mobile/desktop [Optional] Default: show everywhere
            allowClose: true, // allow the user to close the modal by tapping outside of it [Optional. Default: false]
            showArrow: true, // show the bouncing arrow on the modal [Optional. Default: true] (highly recommend leaving at true as drastically affects install rates)
        });

        ret = window.AddToHomeScreenInstance.show(
        'pt'); // show "add-to-homescreen" instructions to user, or do nothing if already added to homescreen
        // [optional] language.  If left blank, then language is auto-decided from (1) URL param locale='..' (e.g. /?locale=es) (2) Browser language settings
        
        // Add button click handler to show modal
        const installButton = document.getElementById('install-app-button');
        if (installButton) {
            installButton.addEventListener('click', function(e) {
                e.preventDefault();
                if (window.AddToHomeScreenInstance) {
                    window.AddToHomeScreenInstance.clearModalDisplayCount();
                    window.AddToHomeScreenInstance.show('pt');
                }
            });
        }
    });
</script>
<?php } ?>
