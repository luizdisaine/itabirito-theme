<?php if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>

<div class="container main" id="conteudo">
    <div class="row">
    <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 ms-auto me-auto left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
        <div class="col-lg-8 ms-auto">
        <?php 
                if (have_posts()) {
                        while (have_posts()) { the_post();      
                            if (have_rows('datas')) {
                                if (has_post_thumbnail($post)) {
                                    $thumb = get_the_post_thumbnail_url($post,'noticia-home');
                                } else {
                                    $thumb = get_template_directory_uri(  ).'/img/no-thumb.png';
                                }
                                $local = get_field('local_do_evento');
                                echo '<div class="row bg-light event-card p-3"><div class="col-lg-4"><img src="'.$thumb.'" alt="'.get_the_title().'"></div><div class="col-lg-5">';
                                while(have_rows('datas')) { the_row();
                                    $inicio = strtotime(get_field('datas_0_data_inicial'));
                                    $final = strtotime(get_field('datas_0_data_final'));
                                    echo '<h6>'.date_i18n('Y',$inicio).'</h6>';
                                    if ($final) {
                                        echo '<h1>De '.date_i18n('j \d\e F',$inicio).' a '.date_i18n('j \d\e F',$final).'</h1>';
                                    } else {
                                        echo '<h1>'.date_i18n('j \d\e F',$inicio).'</h1>';
                                    }
                                }
                                
                                if (get_field('endereco_virtual')) {
                                    echo '<a href="'.get_field('endereco_virtual').'" class="btn btn-sm btn-primary">'.__('Acompanhe o evento','pmi').'</a>';
                                } else {
                                    if ( $local['value'] == 'outro' && !empty(get_field('outro_local')) ) {
                                        echo '<p><label>Local:</label>'.get_field('outro_local').'</p>';
                                    } elseif ( $local['value'] == 'outro' && empty(get_field('outro_local')) ) {
                                        echo '<p>'.__('Local não especificado. Consulte a programação','pmi').'</p>';
                                    } else {
                                        echo '<p><label>Local:</label>'.get_field('local_do_evento')['label'].'</p>';
                                    }
                                }
                                echo '<p><label>Horário:</label>'.date_i18n('H:i',$inicio).'</p>';
                                
                                echo '<div class="col-lg-4"></div></div></div>';
                            }          
                        
                        the_content();
                    }
                }
            ?>
            <div class="row bg-light p-3 mt-3">
                        <div class="col-12">
                            <h4>Leia mais</h4>
                        </div>
                        <div class="col-6">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="col-6">
                            <?php next_post_link(); ?>
                        </div>
                    </div>
        </div>
        <?php if (wp_is_mobile()) { ?>
        <div class="col-lg-4 left-col">
         <?php thesidebar(); ?>
        </div>
        <?php } ?>
    </div>
</div>


<?php get_footer(); ?>