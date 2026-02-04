<?php

/* Template Name: Largura total */

if (wp_is_mobile()) {
    get_header('mobile');
 } else {
    get_header();
 } ?>

    <div class="container main" id="conteudo">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <?php 
                    if (have_posts()) {
                            while (have_posts()) { the_post();                
                            get_template_part( 'assets/contents/content-page' );
                        }
                    }
                ?>
            </div>
        </div>
    </div>
            
<?php get_footer(); ?>