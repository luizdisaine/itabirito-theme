<?php
add_action( 'init', 'create_tax' );

function create_tax() {

    /* Cria Modalidade de contas */
    $args = array(
        'label' => __( 'Modalidades' ),
        'rewrite' => array( 'slug' => 'modalidades-contas' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'modalidades-contas', 'conta', $args );

    /* Cria tipos de contas */
    $args = array(
            'label' => __( 'Tipos' ),
            'rewrite' => array( 'slug' => 'tipos-contas' ),
            'hierarchical' => true,
            'show_in_rest' => true,
    );

    register_taxonomy( 'tipos-contas', 'conta', $args );

    /* Cria modalidades de licitação */
    $args = array(
        'label' => __( 'Modalidades' ),
        'rewrite' => array( 'slug' => 'modalidades-licitacao' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'modalidades-licitacao', 'licitacao', $args );

    /* Cria tipos de contas */
    $args = array(
        'label' => __( 'Tipos' ),
        'rewrite' => array( 'slug' => 'tipos' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'tipos', 'licitacao', $args );

    /* Cria modalidades de procuradoria */
    $args = array(
        'label' => __( 'Modalidades' ),
        'rewrite' => array( 'slug' => 'modalidade_procuradoria' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'modalidade_procuradoria', 'procuradoria', $args );

    /* Cria tipos de procuradoria */
    $args = array(
        'label' => __( 'Tipos' ),
        'rewrite' => array( 'slug' => 'tipo_procuradoria' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'tipo_procuradoria', 'procuradoria', $args );

    /* Cria tipos de procuradoria */
    $args = array(
        'label' => __( 'Categorias de programação' ),
        'rewrite' => array( 'slug' => 'categoria_programacao' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'categoria_programacao', 'programacao', $args );

    /* Cria tipos de notícia */
    $args = array(
        'label' => __( 'Categorias' ),
        'rewrite' => array( 'slug' => 'categoria' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'categoria', 'noticia', $args );

     /* Cria tipos de seleção */
     $args = array(
        'label' => __( 'Tipo de seleção' ),
        'rewrite' => array( 'slug' => 'tipo_selecao' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy( 'tipo_selecao', 'selecao', $args );

}
?>