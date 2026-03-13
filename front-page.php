<?php 

    if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header(); ?>
        <main id="conteudo">
            <?php get_template_part( 'assets/frontpage/destaque-noticias' ); ?>
        </main>
    <?php } ?>

    <div class="container-fluid" id="servicos">
        <div class="row">
            <div class="col-lg-12">
                <h3>Como podemos ajudar?<span>Menu de serviços</span></h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php get_template_part( 'assets/nav/nav_servicos' ) ?>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('assets/frontpage/destaque-programacao');
    if (!wp_is_mobile()) { ?>
    <div class="carousel slide carousel-fade" id="descubraita">
    <div class="descubra text-white">
        <h1 class="open-sans-black">
            <a href="<?php echo get_permalink(get_page_by_path( 'descubra-itabirito' )) ?>">Descubra Itabirito</a></h1>
    </div>
    <div class="carousel-inner">
        <?php 

            $args = array(
                'post_type'=>array('ponto-turistico'),
                'posts_per_page'=>'5',
                'orderby'=> 'rand',
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    )
                )
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
            $order=0;
            while ($query->have_posts()) : $query->the_post();
            $slide = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize' );
        ?>

        <div class="carousel-item<?php if($order == 0) { echo ' active '; }; ?>" data-bs-interval="20000"
            style="background-image: url('<?php echo $slide[0]; ?>')">
        </div>
        <?php $order++; endwhile; endif; 
            wp_reset_postdata(); ?>
    </div>
</div>
    <section class="instagram" id="instagram">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode( '[instagram-feed feed=1]'); ?>
            </div>
        </div>
        </div>
        
    </section>
    <?php } ?>
<?php 
    if (!wp_is_mobile()) {
        get_footer();
    } else {
        get_footer('mobile');
    }
 ?>