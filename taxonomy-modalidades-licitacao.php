<?php 

/*Template Name: Modalidades de licitação */

get_header(); ?>

<div class="container main" id="conteudo">
    <div class="row">
        <div class="col-lg-4">
            <?php thesidebar(); ?>
        </div>
        <div class="col-lg-8 ms-auto">
            <?php
                    conta_filter();
                    
                    if (empty($_GET['ano'])) {
                        if (have_posts()) {
                            while (have_posts()) { the_post();
                                get_template_part( 'assets/contents/content-gestao' );    
                            }
                            pagination($paged, $wp_query->max_num_pages );
                        } else {
                            echo "Nenhum documento corresponde à sua busca";
                        }
                    }                     
                    elseif (!empty($_GET['ano'])) {
                        $ano = $_GET['ano'];
                        
                        $licitacao = array(
                            'post_type'=>'licitacao',
                            'meta_key'		=> 'ano',
                            'meta_value'	=> $ano,
                            'post_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'modalidades-licitacao',
                                    'field'    => 'slug',
                                    'terms'    => $taxonomy->name,
                                ),
                            ),
                        );
                         
                        $query = new WP_Query($licitacao);
                
                    if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) { $query->the_post();
                                get_template_part( 'assets/contents/content-gestao' );
                                
                            }
                            pagination($paged, $query->max_num_pages );
                        } else {
                            echo "Não há documentos que correspondam aos seus critérios.";
                        }
                    }
            ?>
        </div>
    </div>
</div>



<?php get_footer(); ?>