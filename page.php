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
        <div class="col-lg-3 left-col">
            <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-9 ms-auto">
            <?php 
                if (have_posts()) {
                    while (have_posts()) { the_post();
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

<?php } else { ?>

<div class="container-fluid py-5 parent-menu bg-amarelo">
    <div class="container">
        <div class="row menu-parent">
            <div class="col-lg-12">
                <ul class="menu-children text-end">
                    <?php
                        the_content();                
                    
                        wp_list_pages( array(
                            'child_of' => $post->ID, // Only pages that are children of the current page
                            'depth' => 1 ,   // Only show one level of hierarchy
                            'sort_order' => 'asc',
                            'title_li'    => ''
                        ));
                        ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    if (!wp_is_mobile()) {
        menu_servicos();
    }
}
?>

<?php if (wp_is_mobile()) { get_footer('mobile'); } else { get_footer(); } ?>