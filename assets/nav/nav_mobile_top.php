<nav class="navbar navbar-expand-sm mobile ms-auto">
    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'menu_id' => 'mobile',
                'theme_location' => 'top_mobile', 
                'container' => 'div',
                'menu_class' => 'navbar-nav me-auto my-auto topmobile',
            )
        );
    ?>
</nav>