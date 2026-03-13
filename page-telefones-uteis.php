<?php

    // Template Name: Telefones Úteis

    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

    $args = array(
        'post_type'=>'telefone-util',
        'orderby' => 'title_num',
        'order' => 'ASC', 
        'posts_per_page'=>'-1',);

    // List all terms under categoria-atracao taxonomy
    $terms = get_terms(array(
    'taxonomy' => 'tipo-telefone',
    'hide_empty' => false,
    ));


    $wp_query = new WP_Query($args); 
?>

<div class="container main" id="conteudo">
    <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
            <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ms-auto entry-list">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        if (!empty($terms) && !is_wp_error($terms)) {
                            echo '<ul class="categoria-atracao-list list-unstyled d-flex flex-wrap gap-2 mb-4 justify-content-center">';
                            echo '<li><a href="#" class="btn btn-secondary btn-cat" slug="todos">Todos</a></li>';
                            foreach ($terms as $term) {
                                echo '<li><a href="' . get_term_link($term) . '" class="btn btn-secondary btn-cat" slug="' . $term->slug . '">' . $term->name . ' (' . $term->count . ')</a></li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
            <?php
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) { $wp_query->the_post(); 
                        $post_terms = get_the_terms( $post->ID, 'categoria-atracao' );
                    
                    get_template_part( "assets/contents/content-post" ); ?>
                
            

            <?php }
            }
            ?>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.btn-cat').click(function(e) {
            e.preventDefault();
            var category = $this = $(this).attr('slug');
            if (category === 'todos') {
                $('.entry-item').show();
            } else {
                $('.entry-item[slug][slug!="' + category + '"]').hide();
                $('.entry-item[slug*="' + category + '"]').show();
            }
        });
    });
</script>

<?php get_footer(); ?>