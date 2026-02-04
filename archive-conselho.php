<?php get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ms-auto">

            <?php   
                $wp_query = new WP_Query('post_type=conselho&posts_per_page=-1');             
                if ($wp_query->have_posts()) { ?>
                <div id="accordion">
                    <?php while ($wp_query->have_posts()) { $wp_query->the_post();
                            get_template_part( 'assets/contents/content-page' );
                            } ?>
                </div>
                <?php   
            } ?>                   
         <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>  
                    
        </div>
    </div>
</div>

<?php get_footer(); ?>