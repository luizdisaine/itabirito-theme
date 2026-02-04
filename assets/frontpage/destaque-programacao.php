<div class="container-fluid" id="programacao">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto fheadP">
            <a href="<?php echo get_post_type_archive_link('programacao'); ?>" class="d-flex">
            <h6 class="area-title me-auto">Programação em destaque</h6><span><?php echo __('Ver todas'); ?><i class="fas fa-caret-right ms-1"></i></span></a>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
            <?php //$post_count = 0;
            $args = array(
                'post_type'=>array('programacao'),
                'orderby' => 'DESC',
                'posts_per_page'=>'5',
                'meta_query' => array(
                    array(
                        'key'	  	=> 'destaque',
                        'value'	  	=> '1',
                        'compare' 	=> '=',
                    ),
                ),
            );
                
                    $query = new WP_Query($args);

                    while ($query->have_posts()) : $query->the_post();
                        $cpt = get_post_type(); ?>
                        <div class="card<?php echo ' '.$cpt; ?>">
                                <div class="overlay">
                                    <a href="<?php the_permalink(); ?>" class="btn text-white"><?php the_title(); ?></a>
                                </div>
                                <?php 
                                if (has_post_thumbnail()) { 
                        the_post_thumbnail( 'noticia-home' );
                    } else {
                        echo '<img src="'.get_template_directory_uri().'/img/no-news-thumb.jpg'.'" alt="Não há imagem disponível">';
                    } ?>
                            </div>
                <?php
                            //get_template_part( 'assets/contents/content-noticia' );
                                                    
                endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</div>