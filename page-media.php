<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     }

    global $post;
    
    $children = get_pages( array( 'child_of' => $post->ID, 'hierarchical' => 1, 'sort_order' => 'asc' ) ); 
    
    if( count( $children ) == 0 ) { ?>

    <div class="container main" id="conteudo">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
        <?php thesidebar(); ?>
               
        </div>
        <?php } ?>

            <div class="col-lg-8 ms-auto">
                
                <?php
                    $args = array(
                        'post_type' => 'attachment',
                        'posts_per_page' => -1,
                        'post_mime_type' => array('application/pdf','application/vnd.ms-excel','application/msword'),
                        'post_status' => null,
                        'post_parent' => null, // any parent
                    );
                    $atts = get_posts($args);
                    
                    if ($atts) {
                        echo '<ol>';
                        foreach($atts as $post) {
                            setup_postdata( $post );
                            echo '<li>';
                            the_title();
                            the_attachment_link($post->ID, false);
                            echo '</li>';
                            wp_reset_postdata(  );
                        }

                        echo '</ol>';
                    }
                    
                ?>
            </div>
            <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        </div>
    </div>
            
    <?php } else { ?>

        <div class="container-fluid py-5 parent-menu">
            <div class="container">
                <div class="row menu-parent">
                    <div class="col-lg-5">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                    <div class="col-lg-7">
                        <ul class="menu-children">
                         <?php
                            wp_list_pages( array(
                                'child_of' => $post->ID, // Only pages that are children of the current page
                                'depth' => 1 ,   // Only show one level of hierarchy
                                'sort_order' => 'asc',
                                'title_li'    => ''
                        )); ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
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
        </div>
        
    <?php }
?>

<?php get_footer(); ?>