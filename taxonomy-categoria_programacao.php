<?php get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
        <div class="col-lg-3">
            <?php thesidebar(); ?>
        </div>
        <div class="col-lg-9 ms-auto">
            <?php
                if (have_posts()) { ?>
                        <div class="row">
                        <?php while (have_posts()) { the_post();
                            
                            get_template_part( 'assets/contents/content-programacao' );
                            } ?>
                        </div>
                        <?php 
                        
                        pagination($paged, $wp_query->max_num_pages );
                        } else {
                            echo 'Nenhum resultado para sua busca';
                        }                     
                        
            ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>