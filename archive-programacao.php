<?php     if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }
$today = wp_date('Y-m-d H:i:s');
$ncount = '';
?>

<div class="container main" id="conteudo" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 ms-auto me-auto left-col">
        <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ms-auto">
                <div class="row">
                    <?php
                    
                        $next = array(
                            'post_type' => 'programacao',
                            'meta_query' => array(
                                array(
                                'key' => 'datas_$_data_inicial',
                                'value' => $today,
                                'compare' => '>='
                                ),
                            ),
                        );
                        
                        $now = array(
                            'post_type' => 'programacao',
                            'meta_query' => array(
                                array(
                                    'key' => 'datas_$_data_inicial',
                                    'value' => $today,
                                    'compare' => '<='
                                ),
                                array(
                                'key' => 'datas_$_data_final',
                                'value' => $today,
                                'compare' => '>='
                                ),
                            ),
                        );
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $past = array(
                            'post_type' => 'programacao',
                            'posts_per_page' => '20',
                            'paged' => $paged,
                            'meta_query' => array(
                                array(
                                'key' => 'datas_0_data_inicial',
                                'value' => $today,
                                'compare' => '<='
                                ),
                            ),
                        );

                        $proximos = new WP_Query($next);
                        $ncount = $proximos->post_count;
                        $acontece = new WP_Query($now);
                        $query = new WP_Query($past);
                        
                        if($acontece->have_posts()) {
                            echo '<div class="col-lg-12"><h3>'.__('Acontece','pmi').'</h3></div>
                            <div class="owl-carousel owl-theme now mb-5">';
                            while($acontece->have_posts()) {$acontece->the_post();
                                get_template_part('assets/contents/content-acontece');
                            }
                            echo '</div>';
                        }

                        if($proximos->have_posts()) {
                            echo '<div class="col-lg-12"><h6>'.__('Próximos eventos','pmi').'</h6></div><div class="owl-carousel owl-theme mb-5 next">';
                            while($proximos->have_posts()) {$proximos->the_post();
                                $ev_date = strtotime(get_field('datas_0_data_inicial'));
                                if (has_post_thumbnail($post)) {
                                    $thumb = get_the_post_thumbnail_url($post,'noticia-home');
                                } else {
                                    $thumb = get_template_directory_uri(  ).'/img/no-thumb.png';
                                }
                                $evento = '<span>'.date_i18n('j \d\e F',$ev_date).'</span><a href="'.get_permalink().'"><img src="'.$thumb.'" /></a><h6>'.get_the_title().'</h6>';
                                if($ncount == 1) {
                                    echo '<div class="col-lg-12 bg-light p-3 nextitem">'.$evento.get_the_excerpt().'<br/><a href="'.get_permalink().'" alt="'.get_the_title().'" class="btn btn-sm btn-primary">Saiba mais</a></div>';
                                } elseif ($ncount == 2) {
                                    echo '<div class="nextitem">'.$evento.'</div>';
                                } else {
                                    echo '<div class="nextitem">'.$evento.'</div>';
                                } ?>
                            <?php }
                            echo '</div>';
                        }

                        if($query->have_posts()) {
                            echo '<div class="col-lg-12"><h6>'.__('Eventos finalizados','pmi').'</h6></div><table class="table table-striped table-hover"><thead class="table-dark"><tr><th>Data</th><th>Nome do evento</th><th></th></tr></thead><tbody class="entry-list">';
                            while($query->have_posts()) {$query->the_post();
                                if (has_post_thumbnail($post)) {
                                    $thumb = get_the_post_thumbnail_url($post,'noticia-home');
                                } else {
                                    $thumb = get_template_directory_uri(  ).'/img/no-thumb.png';
                                }
                                $ev_title = get_the_title();
                                $ev_link = get_permalink();
                                $ev_date = strtotime(get_field('datas_0_data_inicial'));
                                echo '<tr class="ev_past"><td>'.date_i18n('F \d\e Y',$ev_date).'</td><td>'.get_the_title().'<div class="thumb"><img src="'.$thumb.'" loading="lazy" /></div></td><td><a href="'.$ev_link.'" class="btn btn-sm btn-primary">Detalhes<i class="fa-solid fa-caret-right ms-1"></i></a></td></tr>';
                            }
                            wp_reset_postdata();
                            echo '</tbody></table>';
                            ajax_pagination();
                        }

                    ?>
                </div>
                <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>       
        </div>
    </div>
</div>

<?php get_footer(); ?>
<script>
    jQuery(document).ready(function(){
        jQuery(".now").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: 1
        });
        jQuery(".owl-carousel.next").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            items: <?php if ($ncount != 2) {
                echo $ncount;
                } else {
                    echo '3';
                } ?>
        });
    });
</script>