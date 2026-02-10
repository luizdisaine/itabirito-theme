<?php 
    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

    // List all terms under categoria-atracao taxonomy
    $terms = get_terms(array(
    'taxonomy' => 'categoria-atracao',
    'hide_empty' => false,
    ));

    $args = array(
        'post_type'=>'ponto-turistico',
        'orderby' => 'title_num',
        'order' => 'ASC', 
        'posts_per_page'=>'-1',);

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
                            echo '<ul class="categoria-atracao-list list-unstyled d-flex flex-wrap gap-2 mb-4">';
                            echo '<li><a href="#" class="btn btn-secondary btn-cat" slug="todos">Todos</a></li>';
                            foreach ($terms as $term) {
                                echo '<li><a href="' . get_term_link($term) . '" class="btn btn-secondary btn-cat" slug="' . $term->slug . '">' . $term->name . ' (' . $term->count . ')</a></li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </div>
            </div>

            <?php
                if ($wp_query->have_posts()) {
                    while ($wp_query->have_posts()) { $wp_query->the_post(); 
                        $post_terms = get_the_terms( $post->ID, 'categoria-atracao' );
                    ?>
            <div class="entry-item row mb-3 p-3 bg-light" slug="<?php foreach ($post_terms as $post_term) { echo ' ' . $post_term->slug; } ?>">
                <div class="col-lg-4 col-sm-12">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('thumbnail', ['class' => 'float-left me-3']);
                } else {
                    echo '<img src="'.get_template_directory_uri().'/img/no-thumb.png" class="float-left me-3" width="150">';
                } ?>
                </div>
                <div class="col-lg-8">
                    <h4><?php the_title(); ?></h4>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-danger text-white">Conheça!</a>
                </div>
            </div>
            <?php }
            }
            ?>
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