<?php 

$count = '';

        $args = array(
            'post_type'=>'programacao',
            'meta_query' => array(
                array(
                    'key'	  	=> 'destaque',
                    'value'	  	=> '1',
                    'compare' 	=> '=',
                ),
            ),
            'posts_per_page'=>'-1',);

                $query = new WP_Query($args);
                
                $count = $query->post_count;
                if ($query->have_posts()) { ?>

    <div class="col-lg-8 mx-auto" id="acontece-aqui">
        <a href="<?php echo get_post_type_archive_link('programacao'); ?>" class="d-flex w-100 mb-1">       
        <h6 class="area-title">Acontece aqui</h6><span class="ms-auto"><?php echo __('Ver todas'); ?><i class="fas fa-caret-right ms-1"></i></span></a>
    </div>
    <div class="col-lg-8 mx-auto carousel-programacao py-3">
        <div class="owl-carousel owl-theme">
            <?php while ($query->have_posts()) { $query->the_post();                
                get_template_part( 'assets/contents/content-programacao' );
            }
            wp_reset_postdata(); ?>
        </div>
    </div>

        <?php } if ($count == 1) {
        ?>

        <script>
        
        var owl = jQuery('.owl-carousel');
            owl.owlCarousel({
            center: true,
            margin: 0,
            nav: false,
            dots: false,
            responsive: {
                320: {
                    items: 1
                },
                768: {
                    items: 1
                },
            }
            })
        
        </script>
        <?php } elseif ($count == 2){ ?>
          <script>
        
        var owl = jQuery('.owl-carousel');
            owl.owlCarousel({
            center: false,
            margin: 300,
            nav: false,
            dots: false,
            responsive: {
                320: {
                    items: 1
                },
                768: {
                    items: 2
                },
            }
            })
        
        </script>
        <?php } elseif ($count == 3){ ?>
          <script>
        
        var owl = jQuery('.owl-carousel');
            owl.owlCarousel({
            center: center,
            margin: 20,
            nav: false,
            dots: false,
            responsive: {
                320: {
                    items: 1
                },
                768: {
                    items: 3
                },
            }
            })
        
        </script>
        <?php } elseif ($count >= 3) { ?>
          <script>
        
        var owl = jQuery('.owl-carousel');
            owl.owlCarousel({
            center: true,
            autoplay: true,
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                320: {
                    items: 1
                },
                768: {
                    items: 3
                },
            }
            })
        
        </script>
        
        <?php } ?>