<?php 

    if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     }
$servico = ['associacao', 'escola', 'telefone-util', 'cooperativa'];
$descubra = ['restaurante', 'agencia', 'hospedagem'];
$turismo = ['roteiro', 'ponto-turistico', 'atracao'];
?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-9 ms-auto entry-list">

            <?php
                $types = array();
                $entries= array();
                
                if (have_posts()) {
                    echo '<div class="row">';
                        while (have_posts()) { the_post();
                            if (get_field('tipo')) {
                                $tipo = get_field('tipo');
                                array_push($entries, $post);
                                array_push($types, $tipo);
                            } elseif (is_post_type_archive( 'agencia' )) {
                                get_template_part( 'assets/contents/content-post' );
                            } elseif (is_post_type_archive( 'procuradoria' )) {
                                get_template_part('assets/contents/content-gestao');
                            } else {
                            get_template_part( 'assets/contents/content-page' );
                            }
                        }
                        if (!empty($types)) {                        
                            $types = (array_unique($types, SORT_REGULAR));
                            sort($types);
                            foreach ($types as $type) { ?>
                                <a id="<?php echo $type['value'] ?>"></a>
                                <h4><?php echo $type['label']; ?></h4>
                                <?php foreach ($entries as $post) {
                                    $check = get_field('tipo');
                                    if ($check['value'] == $type['value']) { 
                                        get_template_part( 'assets/contents/content-post' );
                                    }
                                wp_reset_postdata();
                                }
                            } 
                        }
                        if(!is_post_type_archive($descubra) && !is_post_type_archive($turismo)) {
                            ajax_pagination();     
                        }
                        echo '</div>';
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

<?php if (is_post_type_archive($servico)) { 
    menu_servicos();
 } get_footer(); ?>