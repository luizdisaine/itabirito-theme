<?php
    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }
?>

<div class="container main" id="conteudo">
    <div class="row">
        <div class="col-lg-4">
            <?php thesidebar(); ?>
        </div>
        <div class="col-lg-8 ms-auto">
            <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();                
                        get_template_part( 'assets/contents/content-noticia' );
                    }
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>