<header id="maintop" class="d-flex flex-column">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-8">
            <div id="bannerslider" class="carousel slide banner">
            <div class="carousel-inner">
            <?php 
            $publi = array(
                'post_type'=>'banner',
                'posts_per_page'=>'-1',
                'order' => 'ASC',
            );
            $banners = new WP_Query($publi); 
            $order=0;
            while($banners->have_posts()) { $banners->the_post();  ?>
                <div class="carousel-item<?php if($order == 0) { echo ' active '; }; ?>" data-bs-interval="9500">
                    <a href="<?php if (get_field('pagelink')) { echo get_field('pagelink'); } if (get_field('slide_url')) {echo get_field('slide_url');} ?>"><img src="<?php echo get_field('slide_img')['url']; ?>" class="colorref"></a>
                </div>
            <?php $order++; } ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerslider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerslider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>
            </div>
            <div class="col-lg-4">
                <div class="atalhos">
                    <?php
                        if (!wp_is_mobile()) {
                            get_search_form();
                        }
                        get_template_part('assets/nav/nav_quick');
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    jQuery(document).ready(function(){
        jQuery(function () {
            jQuery('.colorref').primaryColor({
                callback: function(color){
                    jQuery(this).parents('.carousel-item').css('background-color', 'rgb('+color+')');
                }
            });
        });
    });
</script>