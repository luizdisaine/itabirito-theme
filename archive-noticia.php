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
        <div class="col-lg-3">
        <?php thesidebar(); ?>
        </div>
        <?php }
            if (have_posts()) {
                echo '<div class="col-lg-9 ms-auto entry-list">';
                        while (have_posts()) { the_post();
                            get_template_part('assets/contents/content-noticia');
                        }
                    }
                echo '</div>';
                echo '<div class="col-lg-9 ms-auto">';
                ajax_pagination();
                echo '</div>';
            ?>
        </div>
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>