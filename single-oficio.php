<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-9 ms-auto">
        <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();
                        echo '<h5 class="mb-3">'.__('Data de publicação: ', 'pmi').get_the_date().'</h5>';                
                        get_template_part( 'assets/contents/content-page' );
                    }
                }
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