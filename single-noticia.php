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
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-9 ms-auto">
        <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();
                            get_template_part( 'assets/contents/content-noticia' );
                        }
                        ?>
                    <div class="row bg-light p-3">
                        <div class="col-12">
                            <h4>Leia mais</h4>
                        </div>
                        <div class="col-6">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="col-6">
                            <?php next_post_link(); ?>
                        </div>
                    </div>
                    
                <?php }
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