    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'theme_location' => 'goto', 
                'container' => false, 
                'menu_class' => 'nav me-auto goto',
                //'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    ?>
