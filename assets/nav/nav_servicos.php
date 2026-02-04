    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'theme_location' => 'servicos', 
                'container' => false, 
                'menu_class' => 'nav ms-auto servicos',
			    //'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    ?>
