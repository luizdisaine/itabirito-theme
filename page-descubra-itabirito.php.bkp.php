<?php 
    /**
     * Template Name: Descubra Itabirito
     * 
     * @package Itabirito
     */
    
    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

    global $post;
    
    $children = get_pages( array( 'child_of' => $post->ID, 'hierarchical' => 1, 'sort_order' => 'desc' ) ); 
    
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
            <?php
                thesidebar();
            ?>
        </div>
        <?php } ?>
    </div>
</div>

<?php } else { 
    
    $args = array(
                    'post_type' => 'hotsite',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'area-interesse',
                            'field'    => 'slug',
                            'terms'    => 'turismo',
                        ),
                    ),
                );
                $query = new WP_Query($args);?>

<div class="container-fluid py-5 parent-menu bg-amarelo">
    <div class="container">
        <div class="row menu-parent">
                <?php               
                if ($query->have_posts()) { 
                    echo '<div class="col-lg-6">';
                
                    while ($query->have_posts()) {
                        $query->the_post(); ?>
                        <div class="main_turismo" style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
                            <h1><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        </div>
                    <?php }
                    wp_reset_postdata();
                    echo '</div>';
                echo '<div class="col-lg-6">';
                } else {
                    echo '<div class="col-lg-12">';
                }
                ?>
                <?php if (wp_is_mobile()) {
                    wp_nav_menu(
                        array(
                            'depth' => '1',
                            'theme_location' => 'turismo', 
                            'container' => false, 
                            'menu_class' => 'me-auto'
                            )
                        );
                    } else {
                        echo '<ul class="menu-children text-end">';
                        the_content();                
                     
                        wp_list_pages( array(
                            'child_of' => $post->ID, // Only pages that are children of the current page
                            'depth' => 1 ,   // Only show one level of hierarchy
                            'sort_column' => 'post_title',
                            'sort_order' => 'ASC',
                            'title_li'    => ''
                        ));
                        echo '</ul>';
                    } ?>
                
            </div>
        </div>
    </div>
</div>
<?php if (!wp_is_mobile()) { ?>
<!--div class="container-fluid" id="servicos">
    <div class="row">
        <div class="col-lg-12">
            <h3>Como podemos ajudar?<span>Menu de serviços</span></h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php //get_template_part( 'assets/nav/nav_servicos' ) ?>
            </div>
        </div>
    </div>
</!--div -->

<?php }}
?>

<?php get_footer(); ?>