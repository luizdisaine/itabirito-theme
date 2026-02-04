<?php

function ajax_load_more() {
    $page = $_POST['pageno'];
    $cpt = $_POST['cpt'];
    $lines = array();
    $args = array(
        'post_type' => "'".$cpt."'",
        'post_status' => 'publish',
        'paged' => $page
    );
    $entries = new WP_Query($args);
    if($entries->have_posts()) {
        while($entries->have_posts()) {$entries->the_post();
            if (has_post_thumbnail($post)) {
                $thumb = get_the_post_thumbnail_url($post,'noticia-home');
            } else {
                $thumb = get_template_directory_uri(  ).'/img/no-thumb.png';
            }
            $id = get_the_ID();
            $title = get_the_title();
            $link = get_permalink();
            if($cpt == 'programacao') {
                $ev_date = strtotime(get_field('datas_0_data_inicial'));
                $ext_date = date_i18n('F \d\e Y',$ev_date);
                $line = sprintf('<tr class="ev_past" id="%u"><td>%s</td><td>%s<div class="thumb"><img src="%s" loading="lazy" /></div></td><td><a href="%s" class="btn btn-sm btn-primary">Detalhes<i class="fa-solid fa-caret-right ms-1"></i></a></td></tr>',$id,$ext_date,$title,$thumb,$link);
            }
            if($cpt == 'noticia') {
                $ndate = get_the_date( 'j \d\e F \d\e Y');
                $ntext = substr(get_the_excerpt(),0,200);
                $line = sprintf('<article id="post-%u" class="news-item"><img src="%s"><span>%s</span><h5><a href="%s">%s</a></h5><p>%s [...]</p><div class="news-footer d-flex"><a href="%s" class="btn btn-primary">Veja mais</a></article>',$id,$thumb,$ndate,$link,$title,$ntext,$link);
            }
            if($cpt == 'oficio') {
                $line = sprintf('<li id="post-%u"><a href="%s">%s</a></li>',$id,$link,$title);
            }
            array_push($lines, $line);
        }
        wp_reset_postdata();
        $max = $entries->max_num_pages;
        if( $max == $page) {
            $pagenum = 0;
        } else {
            $pagenum = $page + 1;
        }
    }
    $list['lista'] = $lines;
    $list['next'] = $pagenum;
    echo json_encode($list);
    die();
}
add_action( 'wp_ajax_load_more', 'ajax_load_more' );
add_action( 'wp_ajax_nopriv_load_more', 'ajax_load_more' );

function ajax_get_services() {
    $categoria = $_POST['categoria'];
    $temas = get_terms(array(
        'taxonomy' => 'tema',
        'hide_empty' => false
    ));
    foreach($temas as $tema) {
        $args = array(
            'post_type' => "servico",
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'grupo',
                    'terms' => $categoria,
                    'field' => 'slug',
                )
                ),
                array(
                        'taxonomy' => 'tema',
                        'terms' => $tema->slug,
                        'field' => 'slug',
                    )
                );
        $items = new WP_Query($args);
        if ($items->have_posts()) {
            echo '<ul class="servicelist"><h3>'.$tema->name.'</h3>';
                while($items->have_posts()) { $items->the_post();
                    echo '<li><a href="'.get_permalink().'" class="btn btn-outline-primary btn-md">'.get_the_title().'</a></li>';
                }
            echo '</ul>';
        }
    }
    die;
}
add_action( 'wp_ajax_get_services', 'ajax_get_services' );
add_action( 'wp_ajax_nopriv_get_services', 'ajax_get_services' );
