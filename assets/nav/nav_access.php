    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'theme_location' => 'acessibilidade', 
                'container' => false, 
                'menu_class' => 'nav me-auto acess',
                //'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    ?>