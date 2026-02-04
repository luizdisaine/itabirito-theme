<?php 
    if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     }
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
            if (have_posts()) {
                while (have_posts()) { the_post(); ?>
                    <div class="entry-item row mb-3 p-3 bg-light">
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
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>