<?php if (wp_is_mobile()) {
        get_header('mobile');
    } else {
        get_header();
    }

 ?>

<div class="container main" id="conteudo">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <?php
                echo '<h1>'.__('Não encontramos nada que corresponda ao que você procura.', 'pmi').'</h1>';
                echo '<p>'.__('Experimente usar o campo de busca no topo desta página ou procure o que precisa no mapa do site, disponível no menu acima ou no link abaixo.','pmi').'</p>';
                echo '<a href="'.get_permalink(get_page_by_path( 'mapa-do-site' )).'" class="btn btn-outline-dark btn-lg">'.__('Mapa do site','pmi').'</a>';
            ?>
        </div>
    </div>
</div>


<div class="container-fluid" id="servicos">
    <div class="row">
        <div class="col-lg-12">
            <h3>Como podemos ajudar?<span>Menu de serviços</span></h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part( 'assets/nav/nav_servicos' ) ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>