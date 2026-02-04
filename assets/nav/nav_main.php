<nav class="navbar navbar-expand-sm p-0 my=auto">
  <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_principal" aria-controls="collapse_principal"
      aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
    <?php
        wp_nav_menu(
            array(
                'depth' => '4',
                'menu_id' => 'principal',
                'theme_location' => 'primary', 
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'collapse_principal',
                'menu_class' => 'navbar-nav me-auto my-auto principal',
			          //'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    ?>
</nav>