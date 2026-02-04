<?php function programacao_filter() {
$args = array(
            'post_type'=>'programacao',
            'posts_per_page'=>'-1',
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
        $tipos_prog = array();
        while ($query->have_posts()) { $query->the_post();
            $tiprog = get_field('tipo');
                array_push($tipos_prog, $tiprog);
        }

        $tipos_prog = (array_unique($tipos_prog, SORT_REGULAR)); ?>

        <form id="site_quick_jump_form" method="get" action="">
        <select name="tipo" id="tipo" class="site_quick_jump form-control bg-light">
          <option value="">Selecione um calendário</option>
        <?php
        foreach ($tipos_prog AS $tipo) :
            if (!empty($tipo)) {
                echo "<option value='".get_post_type_archive_link( 'programacao' )."?tipo=".$tipo['value']."'>".$tipo['label']."</option>\n";
            }
        endforeach;
        ?>
            </select>
        </form>

<?php
    }}

    function conta_filter() {

        $cp_type = get_post_type();

        $args = array(
            'post_type' => $cp_type,
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $years = array();
            while ($query->have_posts()) { $query->the_post();
                $year = get_field('ano');
                    array_push($years, $year);
        }
        $years = (array_unique($years));
        sort($years);
        
    } ?>

    <form class="form-group form-inline year-filter" id="site_quick_jump_form" method="get" action="">
        <p>Encontre o documento que procura informando o ano desejado.</p>
        <select name="ano" id="ano" class="form-control bg-light site_quick_jump">
            <option value="">SELECIONE UM ANO</option>
            <?php foreach($years as $year) {
                if (!empty($year)) {
                echo '<option value="?ano='.$year.'">'.$year.'</option>';
                }
            } ?>
        </select>
    </form>

    <?php }

function has_children() {
	global $post;
	return wp_count_posts( get_children( array('post_parent' => $post->ID) ) );
}

function menu_servicos() { ?>
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

<?php }

function is_descendant( $page_id ) {
    global $post;
    return is_page() && in_array( $page_id, $post->ancestors );
}
?>