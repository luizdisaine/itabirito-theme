<?php get_header(); ?>

<div class="container main" id="conteudo" id="content">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ml-auto">

            <?php                
                if (have_posts()) { 
                    while (have_posts()) { the_post();
                            get_template_part( 'assets/contents/content-processo' );
                    }  
                    pagination( $paged, $wp_query->max_num_pages); // Pagination Function 
            } else {
                echo "Não há resultados para a sua busca.";
            } ?>                   
            
                    
        </div>
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>