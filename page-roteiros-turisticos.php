<?php 
    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

    $args = array(
            'post_type'=>'roteiro',
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
            <?php
            if ($wp_query->have_posts()) {
                while ($wp_query->have_posts()) { $wp_query->the_post(); ?>
                    <div class="entry-item row mb-3 p-3 bg-light">
                        <div class="col-lg-4">
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
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>