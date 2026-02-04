<?php

/*=============================
Breadcrumbs
==========================*/

function the_breadcrumb() {
    global $post;
    $classPage = '';
    //the_classPage();
    $sep = ' &raquo; ';
    $mt = get_post_ancestors( $post );
        if($mt){
          $breadcrumb[0] = $mt;
          $mt = get_post_ancestors( $mt );
          if($mt){
            $breadcrumb[1] = $mt;
          }
        }
        krsort($breadcrumb[0]);
        $count_breadcrumb = 0;
    if (!is_front_page()) { ?>

<!-- BREADCRUMB -->

<div class="container-fluid py-3 breadcrumbs-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="breadcrumbs">
              <li><a class="home" href="<?php echo get_option('home'); ?>"><?php echo bloginfo('name'); ?></a></li>
              <?php
                if (is_page()) {
                foreach($breadcrumb[0] as $breadcrumb_id){ ?>
                  <li><a href="<?php echo get_the_permalink( $breadcrumb_id ) ?>" class="breadcrumb-link" data-session="<?php echo get_post_field( 'post_name', $breadcrumb_id ); ?>"><?php echo get_the_title( $breadcrumb_id ); ?></a></li>
                  <?php
                  $count_breadcrumb++;
                }}              
              ?>
            </ul>
            <h3><?php the_title(); ?></h3>         
          </div>
        </div>      
      </div>
</div>

 <!-- /BREADCRUMB -->
<?php } } ?>