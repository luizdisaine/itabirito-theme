<?php get_header(); ?>

    <div class="container main" id="conteudo" id="content">
        <div class="row">
            <div class="col-lg-3 left-col">
                <?php thesidebar(); ?>
            </div>
            <div class="col-lg-8 ml-auto">
            
            <?php 
                if (have_posts()) {
                    while (have_posts()) { the_post();                
                    get_template_part( 'assets/contents/content-processo' );
                }
                pagination($paged, $wp_query->max_num_pages );
                } else {
                echo 'Não há nenhuma entrada';
                }
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>