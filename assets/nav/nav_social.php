<nav class="navbar navbar-expand-sm ms-auto my-auto">
    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'theme_location' => 'social', 
                'container' => false, 
                'menu_class' => 'navbar-nav social',
                'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    
    ?>
</nav>