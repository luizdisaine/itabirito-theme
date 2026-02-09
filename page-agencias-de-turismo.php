<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>
    
    
    <div class="container main" id="conteudo" id="content">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
        <?php thesidebar(); ?>
        </div>
        <?php } ?>

            <div class="col-lg-9 ms-auto">
            <div class="row">
                
            <?php $post_count = 0;

        $args = array(
            'post_type'=>'agencia',
            'orderby' => 'title_num',
            'order' => 'ASC', 
            'posts_per_page'=>'-1',);

                $wp_query = new WP_Query($args);
                while ($wp_query->have_posts()) : $wp_query->the_post();
                
                
            get_template_part( 'assets/contents/content-post' );
                                                
            endwhile;
            wp_reset_postdata(); ?>
            </div>
            </div>
        </div>
    </div>

<?php 
if (!wp_is_mobile()) {
    get_footer();
} else {
    get_footer('mobile');
}
?>