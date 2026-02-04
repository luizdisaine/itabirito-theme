<div class="row">
    <div class="col-lg-4 text-center">
    <?php
        $query = new WP_Query();
        $query->query('post_type=roteiro&orderby=rand&posts_per_page=1');

        if ($query->have_posts()) {
        while ($query->have_posts()) { $query->the_post();
            $post_type = get_post_type();
            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);
            echo '<a class="text-white text-uppercase link-custom-post-type-' . $post_type . '" href="'. $post_type_archive.'" title="'. $post_type_object->labels->name.'">';
            the_post_thumbnail( 'img-descubra' );
            echo 'Roteiros turísticos</a>';
        }}
        wp_reset_postdata();
    ?>
    </div>
    <div class="col-lg-4 text-center">
    <?php 
    
        $query = new WP_Query();
        $query->query('post_type=atracao&orderby=rand&posts_per_page=1');

        if ($query->have_posts()) {
        while ($query->have_posts()) { $query->the_post();
            $post_type = get_post_type();
            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);
            echo '<a class="text-white text-uppercase link-custom-post-type-' . $post_type . '" href="'. $post_type_archive.'" title="'. $post_type_object->labels->name.'">';
            the_post_thumbnail( 'img-descubra' );
            echo 'Atrações naturais</a>';
        }}
        wp_reset_postdata();
    ?>
    </div>
    <div class="col-lg-4 text-center">
    <?php 
    
        $query = new WP_Query();
        $query->query('post_type=ponto-turistico&orderby=rand&posts_per_page=1');

        if ($query->have_posts()) {
        while ($query->have_posts()) { $query->the_post();
            $post_type = get_post_type();
            $post_type_object = get_post_type_object($post_type);
            $post_type_archive = get_post_type_archive_link($post_type);
            echo '<a class="text-white text-uppercase link-custom-post-type-' . $post_type . '" href="'. $post_type_archive.'" title="'. $post_type_object->labels->name.'">';
            the_post_thumbnail( 'img-descubra' );
            echo 'Pontos turísticos</a>';
        }}
        wp_reset_postdata();
    ?>
    </div>
</div>