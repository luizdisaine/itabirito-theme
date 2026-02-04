<?php get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ms-auto">
                
                <?php

                    conta_filter();
                    
                    if (empty($_GET['ano'])) {
                        if (have_posts()) {
                            while (have_posts()) { the_post();
                                get_template_part( 'assets/contents/content-gestao' );    
                            }
                            pagination($paged, $wp_query->max_num_pages );
                        }
                    }                     
                    elseif (!empty($_GET['ano'])) {
                        $ano = $_GET['ano'];
                        
                        $contas = array(
                            'post_type'=>'attachment',
                            //'meta_key'		=> 'ano',
                            //'meta_value'	=> $ano,
                            'post_per_page' => -1,
                            'post_mime_type' => 'application/pdf',
                        '   post_status' => null,
                            'post_parent' => 'any', // any parent
                        );
                         
                        $query = new WP_Query($contas);
                
                    if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) { $query->the_post();
                                get_template_part( 'assets/contents/content-gestao' );                                
                            }
                            pagination($paged, $query->max_num_pages );
                        } else {
                            echo "Não há nenhum resultado que corresponda ao seus critérios de busca.";
                        }
                    }
                ?>
            <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>           
        </div>
    </div>
</div>

<?php get_footer(); ?>