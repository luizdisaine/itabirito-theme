<?php get_header(); ?>

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
                    echo '<ul class="entry-list">';
                    while (have_posts()) {the_post();
                        echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                    } 
                    echo '</ul>';
                    ajax_pagination();
            } ?>                   
         <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>  
                    
        </div>
    </div>
</div>

<?php get_footer(); ?>