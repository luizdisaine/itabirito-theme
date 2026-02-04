<nav class="navbar navbar-expand-sm mobile ms-auto">
<button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_principal" aria-controls="collapse_principal"
    aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
    <?php
        wp_nav_menu(
            array(
                'depth' => '1',
                'menu_id' => 'mobile',
                'theme_location' => 'mobile_main', 
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'collapse_principal',
                'menu_class' => 'navbar-nav me-auto my-auto mobile',
            )
        );
    ?>
</nav>