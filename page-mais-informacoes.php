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

    global $post; ?>

<div class="container-fluid py-5 parent-menu bg-amarelo">
    <div class="container">
        <div class="row menu-parent">
            <div class="col-lg-12">
                <?php if (wp_is_mobile()) {
                    wp_nav_menu(
                        array(
                            'depth' => '2',
                            'theme_location' => 'mais_turismo', 
                            'container' => false, 
                            'menu_class' => 'me-auto'
                            )
                        );
                    } ?>
                
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>