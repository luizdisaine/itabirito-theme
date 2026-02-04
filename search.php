<?php get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();                
                        get_template_part( 'assets/contents/content-page' );
                    }
                    pagination($paged, $wp_query->max_num_pages );
                } else {
                  echo  "Não encontramos resultados para a sua busca.";
                } ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>