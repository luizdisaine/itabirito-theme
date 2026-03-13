<?php

function thesidebar() {

    global $post;
    $post_title = get_the_title($post);
    $post_type = get_post_type();
    $descubra = ['restaurante', 'agencia', 'hospedagem'];
    $turismo = ['roteiro', 'ponto-turistico', 'atracao'];
    $servico = ['associacao', 'escola', 'telefone-util', 'cooperativa'];
    $prefeitura = ['secretaria', 'conselho', 'plano', 'selecao', 'glossario','oficio'];
    $noticia = ['noticia'];
    $diferencial = ['diferencial'];

    $obj_id = get_queried_object_id();
    $current_url = get_permalink( $obj_id );
    
    // Lista terms in categoria para o tipo de post noticia
    if (is_post_type_archive('noticia') || is_singular('noticia') || is_tax( 'categoria' )) {
        $terms = get_terms( 'categoria' ); 
        
            $args = array( 'hide_empty=0' );
            
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            
            $term_list = '<ul class="ev_cats">';
            foreach ( $terms as $term ) {
                //$i++;
                $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
            }
            $term_list .= '</ul>';
            echo $term_list;

        }
    
    // Lista terms em categoria_programacao para o tipo de post programacao
    } elseif (is_post_type_archive('programacao') || is_singular('programacao') || is_tax( 'categoria_programacao' )) { 
        $args = array( 'hide_empty=0' );
        
        $terms = get_terms( 'categoria_programacao');
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            
            $term_list = '<ul class="ev_cats">';
            foreach ( $terms as $term ) {
                //$i++;
                $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>';
            }
            $term_list .= '</ul>';
            echo $term_list;

        }
    
    
    } elseif (is_singular($prefeitura) OR is_page()) {

        $parent = get_field('parent_secretaria');
        if ($parent) {
            echo '<h6 class="parent"><a href="'.get_permalink($parent[0]).'">'.get_the_title($parent[0]).'<i class="fa-solid fa-turn-up ms-2"></i></a></h6>';
        }

        if (get_field('conteudo_secretaria')) {
            $secretaria = get_field('nome_secretaria');
            echo '<h6 class="parent"><a href="'.get_permalink($secretaria[0]).'">'.get_the_title($secretaria[0]).'<i class="fa-solid fa-turn-up ms-2"></i></a></h6>';
        }

        if(is_singular('secretaria')) {
            $secpages = get_posts(array(
                'post_type' => array('page', 'oficio', 'conselho'),
                'numberposts' => -1,
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'conteudo_secretaria',
                        'value' => '1',
                        'compare' => 'LIKE',
                    ),
                    array(
                        'key' => 'nome_secretaria',
                        'value' => '"'.$post->ID.'"',
                        'compare' => 'LIKE',
                    )
                )
            ));
            if($secpages) {
                echo '<ul class="left_menu">';
                foreach($secpages as $post) {
                    setup_postdata( $post );
                    echo '<li><a href="'.get_permalink().'" alt="'.get_the_title().'">'.get_the_title().'</a></li>';
                    wp_reset_postdata(  );
                };
                echo '</ul>';
            }
        }

        echo '<ul class="left_menu">';
        $ancestor = get_post_ancestors( $post->ID );
        $ancestorPT = get_post_type_object(get_post_type($post))->name;
        if($post->post_parent) {
            $top_ancestor = !empty($ancestor) ? end($ancestor) : $post->ID;
            $listargs = array(
            'child_of' => $top_ancestor, // Only pages that are children of the top-level ancestor
            'depth' => 1 ,   // Only show one level of hierarchy
            'sort_order' => 'asc',
            'title_li'    => '',
            'post_type' => $ancestorPT
            );
            echo '<h6 class="parent"><i class="fa-solid fa-circle-left me-1"></i><a href="'.get_permalink( $top_ancestor ).'">'.get_the_title($top_ancestor).'</a><ul class="parent_menu">';
            wp_list_pages($listargs);
            echo '</ul></h6>';
            wp_list_pages( array(
            'child_of' => $post->ID, // Only pages that are children of the current page
            'depth' => 1 ,   // Only show one level of hierarchy
            'sort_order' => 'asc',
            'title_li'    => '',
            'post_type' => $ancestorPT
            ));
        } else {
        wp_list_pages( array(
            'child_of' => $post->ID, // Only pages that are children of the current page
            'depth' => 1 ,   // Only show one level of hierarchy
            'sort_order' => 'asc',
            'title_li'    => '',
            'post_type' => $ancestorPT
        ));
        }
        echo '</ul>';

        $relPages = get_field('paginas_relacionadas');
        $links = get_field('links_relacionadas');
                
        if( $relPages OR have_rows('links_relacionadas')): ?>
            <ul class="left_menu">
            <?php 
            while(have_rows('links_relacionadas')) { the_row();
                $linkname = get_sub_field('url_name');
                $linkurl = get_sub_field('url_relacionado');
                echo '<li class="link"><a href="'.$linkurl.'">'.$linkname.'</a></li>';
                }
                        
            foreach( $relPages as $post ):
                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach;
                wp_reset_postdata();
            ?>
            </ul>
            <?php endif;
    } elseif (is_post_type_archive($descubra) || is_post_type_archive( $turismo) || is_singular($turismo)) { 
        if (is_post_type_archive($turismo)) { ?>
        <ul class="left_menu">
            <?php while (have_posts()) { the_post();
                echo '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
            } ?>
        </ul>         
            <?php } elseif (is_post_type_archive($descubra)) { 
            $tipos = array();
            while (have_posts()) { the_post();
                if (get_field('tipo')) {
                    $tipo = get_field('tipo');
                    array_push($tipos, $tipo);
                }
            }
                $links = (array_unique($tipos, SORT_REGULAR));
                if (!empty($links)) {
                    echo '<ul class="left_menu">';
                    foreach ($links as $link) {
                        echo '<li><a href="#'.$link['value'].'">'.$link['label'].'</a></li>';
                    }
                    echo '</ul>';
                }
            } ?>
    <?php } elseif (is_post_type_archive( $servico )) { ?>
        <ul class="left_menu">
        <?php wp_list_pages( array(
            'child_of' => (get_page_by_path( 'servicos')->ID), // Only pages that are children of the current page
            'depth' => 2 ,   // Only show one level of hierarchy
            'sort_order' => 'asc',
            'title_li'    => '',
            'exclude' => '1520, 1521, 1743, 1748, 1753, 1784, 1789, 1823, 2020, 2131'
        )); ?>
        </ul>
    <?php } elseif (is_post_type_archive( $prefeitura ) || is_singular('oficio') || is_tax('tipo_selecao') || is_singular('selecao') ) { 
        if (is_post_type_archive( 'oficio' ) OR is_singular('oficio')) {
            echo do_shortcode('[wpdreams_ajaxsearchpro id=2]');
        }
        ?>
        <ul class="left_menu">
        <?php wp_list_pages( array(
            'child_of' => (get_page_by_path( 'a-prefeitura')->ID), // Only pages that are children of the current page
            'depth' => 2 ,   // Only show one level of hierarchy
            'sort_order' => 'asc',
            'title_li'    => '',
            'exclude' => '1520, 1521, 1743, 1748, 1753, 1784, 1789, 1823, 2020, 2131'
            )); ?>
        </ul>      
    <?php } elseif (is_singular('servico')) { ?>
        <div class="text-end ms-auto">
        <h5><?php _e('Você já usou esse serviço?','pmi'); ?></h5>
    <?php echo do_shortcode( '[wpforms id="85960"]' ).'</div>';
    } elseif (is_page_template( 'taxonomy-tipo_selecao.php' ) && !is_page('trabalhe-conosco'))  { ?>
        <h6 class="subarea_title"><?php echo wp_title(''); ?></h6>
        <?php 
        global $post;

        $categories = get_terms( array(
            'taxonomy' => 'tipo_selecao',
            'hide_empty' => false,
            'order' => 'DESC'
        ) ); ?>
        <ul class="left_menu">
        <?php
            foreach($categories as $cat) { ?>
            <li class="filter" data-role="button" data-filter=".<?php echo $cat->slug; ?>"><a href="<?php echo get_term_link($cat->slug, 'tipo_selecao'); ?>"><?php echo $cat->name; ?></a></li>
            <?php } ?>
        </ul>
    <?php } elseif (is_post_type_archive( 'programacao') OR is_singular('programacao')) { ?>
        <h5 class="area_title">Programação</h5>
    <?php } elseif (is_page()) {
        if ( $post->post_parent ) { ?>
        <h5 class="area_title"><?php echo get_the_title($post->post_parent); ?></h5>
            
        <ul class="left_menu">
        <?php 

        switch($post->post_parent){
            case 1568:
                $types = $diferencial;
                break;
            case 1652:
                $types = $turismo;
                break;
            case 1653:
                $types = $servico;
                break;
            case 2042:
                $types = $prefeitura;
                break;
            case 1899:
                $types = $noticia;
                default:
                    $types = array();
                break;
            } 
                   
            $keys = array_keys($types);
                    
            $size = count($types);
                    
            for ($i = 0; $i < $size; $i++) {
                $key   = $keys[$i];
                $value = $types[$key];
                    
                echo '<li><a href="'.get_post_type_archive_link($value).'">'.get_post_type_object($value)->labels->name.'</a></li>';
                    
            }
                    
            wp_list_pages( array(
                'child_of' => $post->post_parent, // Only pages that are children of the current page
                'depth' => 2 ,   // Only show one level of hierarchy
                'sort_order' => 'asc',
                'title_li'    => '',
                'exclude' => '1520, 1521, 1743, 1748, 1753, 1784, 1789, 1823, 2020, 2131'
            )); ?>
            </ul>
        <?php  } else { ?>
            <h5 class="area_title"><?php the_title(); ?></h5>
        <?php } 
    } 
} ?>