<nav class="navbar navbar-expand-sm p-0">
  <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleinst" aria-controls="collapsibleinst"
      aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleinst">
    <?php
        wp_nav_menu(
            array(
                'depth' => '4',
                'theme_location' => 'institucional', 
                'container' => false, 
                'menu_class' => 'navbar-nav ms-auto institucional',
			          //'walker' => new WP_Bootstrap_Navwalker(),
            )
        );
    ?>
  </div>
</nav>