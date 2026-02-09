<?php

/*=============================
Breadcrumbs
==========================*/

function the_breadcrumb() {

    global $post;
    $sep = '<i class="fa-solid fa-caret-right mx-2"></i>';
    $post_title = get_the_title($post);
    $post_type = get_post_type();
    $post_type_object = get_post_type_object($post_type);
    $post_type_archive = get_post_type_archive_link($post_type);
    $descubra = ['roteiro', 'ponto-turistico', 'atracao', 'restaurante', 'agencia', 'hospedagem'];
    $servico = ['unidade-saude', 'associacao', 'escola', 'telefone-util'];
    $prefeitura = ['secretaria', 'conselho'];

    $taxonomy = single_term_title('',0);
    $parents = array_reverse(get_post_ancestors( $post->ID));

    $home = '<a class="home" href="'.get_option('home').'"><i class="fa-solid fa-house me-2"></i>'.get_bloginfo('name').'</a>';

    if (is_post_type_archive()) {
        $crlink = '';
        $title = '<h3 class="single-title"><a class="bread-custom-post-type-' . $post_type . '" href="'.$post_type_archive.'" title="'.$post_type_object->labels->name .'">'.$post_type_object->labels->name.'</a></h3>';
    }
    
    if (is_post_type_archive( $descubra )) {
        $crlink =  '<a href="'.get_permalink( get_page_by_path( 'descubra-itabirito' )).'" class="upper">'.__('Descubra Itabirito','pmi').'</a>';
    }
    
    if (is_post_type_archive( $servico )) {
        $crlink = '<a href="'.get_permalink( get_page_by_path( 'servicos' )).'" class="upper">'.__('Serviços','pmi').'</a>';
    }
    
    if (is_post_type_archive( $prefeitura )) {
        $crlink = '<a href="'.get_permalink( get_page_by_path( 'a-prefeitura' )).'" class="upper">'.__('A Prefeitura', 'pmi').'</a>';
    }

    if (is_singular( 'programacao' )) {
        $crlink = '<a href="../" class="upper">'.__('Programação','pmi').'</a>';
        $title = '<h3 class="single-title">'.$post_title.'</h3>';
    }

    if (is_singular('noticia')) {
        $title = '';
        $crlink = '<h3 class="single-title"><a class="upper bread-custom-post-type-' . $post_type . '" href="'.$post_type_archive.'" title="'. $post_type_object->labels->name.'">'.$post_type_object->labels->name.'</a></h3>';
    }

    if(is_tax()) {
        $title = '<h3 class="single-title">'.$taxonomy.'</h3>';
    }

    if (is_tax('categoria')) {
        $crlink = '<a href="'.get_permalink( get_page_by_path( 'noticias' )).'" class="upper">'.__('Notícias','pmi').'</a>';
    }

    if (is_tax('categoria_programacao')) {
        $crlink = '<a href="'.get_permalink( get_page_by_path( 'programacao' )).'" class="upper">'.__
        ('Programação','pmi').'</a>';
    }

    if (is_tax('tipo_selecao')) {
        $crlink = '<a class="bread-custom-post-type-' . $post_type . '" href="'.$post_type_archive.'" title="'.$post_type_object->labels->name .'">'.$post_type_object->labels->name.'</a>';
    }

    if (is_singular() OR is_page()) {
        $title = '<h3 class="single-title">'.$post_title.'</h3>';            
        if ( $parents ) {
            foreach ($parents as $parent_post) {
                $crlink .= '<a href="'.get_permalink($parent_post).'" class="upper">'.get_the_title($parent_post).'</a>'.$sep;
            }
            $crlink = preg_replace('/'.preg_quote($sep, '/').'$/', "", $crlink, 1);
        } else {
            $crlink = '<a class="upper bread-custom-post-type-' . $post_type . '" href="'.$post_type_archive.'" title="'. $post_type_object->labels->name.'">'.$post_type_object->labels->name.'</a>';
        }
        if (is_singular($descubra)) {
            $crlink = '<a href="'.get_permalink( get_page_by_path( 'descubra-itabirito' )).'">'.__('Descubra Itabirito','pmi').'</a>';
        }
        if (is_singular('noticia')) {
            $title = '';
        }

        if (is_singular($prefeitura)) {
            $parent = get_field('parent_secretaria');
                if ($parent) {
                    $crlink .= $sep.'<a href="'.get_permalink($parent[0]).'">'.(get_the_title($parent[0])).'</a>';
            } 
        }
    }

    if (is_search()) {
        $crlink = '';
        $title = '<h3 class="single-title">'.__('Resultado da busca','pmi').'</h3>';
    }

    if (!is_front_page(  )) {

        if (!empty($crlink)) {
            $home .= $sep;
        }

        if (!wp_is_mobile()) {
        
        $breadcrumb = sprintf('<div class="container-fluid pt-3 breadcrumbs-wrap"><div class="container"><div class="row"><div class="col-lg-12 breadcrumbs">%s%s<button type="button" class="btn btn-sm btn-outline-dark print" data-bs-toggle="modal" data-bs-target=".print_preview"><span>Visualizar impressão</span><i class="fas fa-print ms-1"></i></button></div></div><div class="row"><div class="col-lg-4"></div><div class="col-lg-8">%s</div></div></div></div>',$home,$crlink,$title);

        } else { 
        $breadcrumb = sprintf('<div class="container-fluid pt-3 breadcrumbs-wrap"><div class="container"><div class="row"><div class="col-lg-12 breadcrumbs">%s%s</div></div><div class="row"><div class="col-lg-4"></div><div class="col-lg-8">%s</div></div></div></div>',$home,$crlink,$title);
        }
        
        echo $breadcrumb;
        
        $sec = get_field('secretario');
        if ($sec) {
            $sec_name = $sec['secretario_nome'];
            $sec_mail = $sec['secretario_mail'];
            echo '<div class="container-fluid pt-1 pb-0 breadcrumbs-wrap"><div class="container"><div class="row"><div class="col-lg-12"><p class="text-end secretario"><label class="me-2">'.__('Responsável','pmi').'</label><a href="mailto:'.$sec_mail.'">'.$sec_name.'</a></p></div></div></div></div>';
        }

    }
    echo '</div>';

} ?>
