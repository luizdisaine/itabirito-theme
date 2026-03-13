<?php
add_action( 'init', 'create_tax' );

function create_tax() {

    /* Cria Modalidade de contas */
    $args = array(
        'label' => __( 'Modalidades' ),
        'rewrite' => array( 'slug' => 'modalidades-contas' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
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
        'show_admin_column' => true,
    );

    register_taxonomy( 'categoria_programacao', 'programacao', $args );

    /* Cria tipos de notícia */
    $args = array(
        'label' => __( 'Categorias' ),
        'rewrite' => array( 'slug' => 'categoria' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'categoria', 'noticia', $args );

    /* Cria tipos de seleção */
     $args = array(
        'label' => __( 'Tipo de seleção' ),
        'rewrite' => array( 'slug' => 'tipo_selecao' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'tipo_selecao', 'selecao', $args );

    /* Cria grupos de serviços */
     $args = array(
        'label' => __( 'Grupo' ),
        'rewrite' => array( 'slug' => 'grupo' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'grupo', 'servico', $args );

    /* Cria grupos de serviços */
     $args = array(
        'label' => __( 'Tema' ),
        'rewrite' => array( 'slug' => 'tema' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );

    register_taxonomy( 'tema', 'servico', $args );

    //Cria áreas de interesse para hotsites
    $args = array(
        'label' => __( 'Áreas de interesse' ),
        'rewrite' => array( 'slug' => 'area-interesse' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy('area-interesse', 'hotsite', $args);

    //Cria categorias de atrações para pontos turísticos
    $args = array(
        'label' => __( 'Categorias de atração' ),
        'rewrite' => array( 'slug' => 'categoria-atracao' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy('categoria-atracao', 'ponto-turistico', $args);

    //Cria tipos de telefone uteis
    $args = array(
        'label' => __( 'Tipos de telefone' ),
        'rewrite' => array( 'slug' => 'tipo-telefone' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy('tipo-telefone', 'telefone-util', $args);

    //Cria categorias de oficio
    $args = array(
        'label' => __( 'Categorias de ofícios' ),
        'rewrite' => array( 'slug' => 'categoria-oficio' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy('categoria-oficio', 'oficio', $args);

} ?>