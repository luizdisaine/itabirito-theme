<?php 

/*Template Name: Onde Ir*/
    if (wp_is_mobile()) {
        get_header('mobile');
     } else {
        get_header();
     } ?>
    
    
    <div class="container main" id="conteudo" id="content">
        <div class="row">
        <?php if (!wp_is_mobile()) { ?>
        <div class="col-lg-3 left-col">
        <?php thesidebar(); ?>
        </div>
        <?php } ?>

            <div class="col-lg-9 ms-auto">
            <div class="row">
                
            <?php
            $archive_ponto_link = get_post_type_archive_link('ponto-turistico');
            $archive_atracao_link = get_post_type_archive_link('atracao');
            echo '<ul class="arquivo_destinos"><li><a href="'.$archive_ponto_link.'">'.__('Pontos Turísticos','pmi').'</a></li><li><a href="'.$archive_atracao_link.'">'.__('Atrações Naturais','pmi').'</a></li></ul>';
            ?>
            </div>
            </div>
        </div>
    </div>
<?php if (!wp_is_mobile()) {
menu_servicos();
get_footer();
} else {
    get_footer('mobile');
} ?>