<?php
/* Template Name: Distrito */
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
                    get_template_part( 'assets/contents/content-page' );


                    // Get all ACF relationship fields
                $fields = get_field_objects();
                if ($fields) {
                    foreach ($fields as $field) {
                        if ($field['type'] === 'relationship') {
                            $related_posts = get_field($field['name']);
                            if ($related_posts) {
                                echo '<h3>' . $field['label'] . '</h3>';
                                foreach ($related_posts as $post) {
                                    setup_postdata($post);
                                    echo '<p>' . get_the_title() . '</p>';
                                    wp_reset_postdata();
                                }
                            }
                        }
                    }
                }


                    }
                } else {
                    echo 'No posts found';
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


<?php
    if (!wp_is_mobile()) {
        menu_servicos();
    }
?>

<?php if (wp_is_mobile()) { get_footer('mobile'); } else { get_footer(); } ?>