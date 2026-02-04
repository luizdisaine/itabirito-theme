<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     }

    global $post;
    
    $categories = get_terms( array(
        'taxonomy' => 'tipo_selecao',
        'hide_empty' => false,
        'order' => 'DESC'
    ) ); ?>
    <div class="container main" id="conteudo" id="content">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
        </div>
        <?php } ?>

            <div class="col-lg-8 ms-auto">
            <ul class="filter-tabs filter-btns clearfix">
                        <?php
				        foreach($categories as $cat) { ?>
                            <li class="filter mb-3" data-role="button" data-filter=".<?php echo $cat->slug; ?>"><a href="<?php echo get_term_link($cat->slug, 'tipo_selecao'); ?>"><?php echo $cat->name; ?></a><span><?php echo $cat->description; ?></span></li>
                        <?php } ?>
                    </ul>
                <?php 
                    if (have_posts()) {
                            while (have_posts()) { the_post();                
                            get_template_part( 'assets/contents/content-page' );
                        }
                    }
                ?>
            </div>
            <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
                <?php get_sidebar(); ?>
        </div>
        <?php } ?>

        </div>
    </div>

<?php get_footer(); ?>