<?php 
/*-----------------------------------------------------------------------------------*/
/*	Cria as notícias
/*-----------------------------------------------------------------------------------*/

function pmi_noticia_register() { 
    $labels = array(
			'name' => _x('Notícias', 'notícias'),
			'singular_name' => _x('Notícia', 'notícias'),
			'add_new' => _x('Adicionar notícia', 'Nova notícia'),
			'add_new_item' => __('Nova notícia'),
			'edit_item' => __('Editar notícia'),
			'new_item' => __('Novo notícia'),
			'view_item' => __('Ver notícia'),
			'search_items' => __('Procurar notícia'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Notícias'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
		'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
		'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-write-blog',
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'author')  
       );    
register_post_type( 'noticia' , $args );
}

add_action('init', 'pmi_noticia_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria o glossário
/*-----------------------------------------------------------------------------------*/

function pmi_glossario_register() { 
    $labels = array(
			'name' => _x('Glossário', 'glossário'),
			'singular_name' => _x('Termo', 'termo'),
			'add_new' => _x('Adicionar termo', 'Novo termo'),
			'add_new_item' => __('Novo termo'),
			'edit_item' => __('Editar termo'),
			'new_item' => __('Novo termo'),
			'view_item' => __('Ver termo'),
			'search_items' => __('Procurar termo'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Glossário'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-format-aside',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','author')  
       );    
register_post_type( 'glossario' , $args );
}

add_action('init', 'pmi_glossario_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os planos diretores
/*-----------------------------------------------------------------------------------*/

function pmi_plano_register() { 
    $labels = array(
			'name' => _x('Planos-diretores', 'planos-diretores'),
			'singular_name' => _x('Plano-diretor', 'plano-diretor'),
			'add_new' => _x('Adicionar plano', 'Novo plano'),
			'add_new_item' => __('Novo plano'),
			'edit_item' => __('Editar plano'),
			'new_item' => __('Novo plano'),
			'view_item' => __('Ver plano'),
			'search_items' => __('Procurar plano'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Revisão de plano diretor'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 20,
        'menu_icon' => 'dashicons-media-document',
		'has_archive' => true,
		'taxonomies'  => array( 'category' ),
        'supports' => array( 'title', 'editor','author')  
    );    
register_post_type( 'plano' , $args );
}

add_action('init', 'pmi_plano_register');


/*-----------------------------------------------------------------------------------*/
/*	Cria a programação
/*-----------------------------------------------------------------------------------*/

function pmi_programacao_register() { 
    $labels = array(
			'name' => _x('Programações', 'programações'),
			'singular_name' => _x('Programação', 'programação'),
			'add_new' => _x('Adicionar programação', 'Nova programação'),
			'add_new_item' => __('Nova programação'),
			'edit_item' => __('Editar programação'),
			'new_item' => __('Novo programação'),
			'view_item' => __('Ver programação'),
			'search_items' => __('Procurar programação'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Programações'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt','author')  
    );    
register_post_type( 'programacao' , $args );
}

add_action('init', 'pmi_programacao_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os banners em destaque
/*-----------------------------------------------------------------------------------*/

function pmi_banner_register() { 
    $labels = array(
			'name' => _x('Banners', 'banners'),
			'singular_name' => _x('Banner', 'banner'),
			'add_new' => _x('Adicionar banner', 'Novo banner'),
			'add_new_item' => __('Novo banner'),
			'edit_item' => __('Editar banner'),
			'new_item' => __('Novo banner'),
			'view_item' => __('Ver banner'),
			'search_items' => __('Procurar banner'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Banners'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 5,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
    );    
register_post_type( 'banner' , $args );
}

add_action('init', 'pmi_banner_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os conselhos
/*-----------------------------------------------------------------------------------*/

function pmi_conselho_register() { 
    $labels = array(
			'name' => _x('Conselhos', 'conselhos'),
			'singular_name' => _x('Conselho', 'conselho'),
			'add_new' => _x('Adicionar conselho', 'Novo conselho'),
			'add_new_item' => __('Novo conselho'),
			'edit_item' => __('Editar conselho'),
			'new_item' => __('Novo conselho'),
			'view_item' => __('Ver conselho'),
			'search_items' => __('Procurar conselho'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Conselhos'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 20,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','author')  
    );    
register_post_type( 'conselho' , $args );
}

add_action('init', 'pmi_conselho_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria as secretarias
/*-----------------------------------------------------------------------------------*/

function pmi_secretaria_register() { 
    $labels = array(
			'name' => _x('Secretarias', 'secretarias'),
			'singular_name' => _x('Secretaria', 'secretaria'),
			'add_new' => _x('Adicionar secretaria', 'Nova secretaria'),
			'add_new_item' => __('Nova secretaria'),
			'edit_item' => __('Editar secretaria'),
			'new_item' => __('Nova secretaria'),
			'view_item' => __('Ver secretaria'),
			'search_items' => __('Procurar secretaria'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Secretarias'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 20,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','author')  
    );    
register_post_type( 'secretaria' , $args );
}

add_action('init', 'pmi_secretaria_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os processos seletivos
/*-----------------------------------------------------------------------------------*/

function pmi_selecao_register() { 
    $labels = array(
			'name' => _x('Processos seletivos', 'processos seletivos'),
			'singular_name' => _x('Processo seletivo', 'processo seletivo'),
			'add_new' => _x('Adicionar processo', 'Novo processo'),
			'add_new_item' => __('Novo processo'),
			'edit_item' => __('Editar processo'),
			'new_item' => __('Novo processo'),
			'view_item' => __('Ver processo'),
			'search_items' => __('Procurar processo'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Processos seletivos'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 20,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'excerpt','author')  
       );    
register_post_type( 'selecao' , $args );
}

add_action('init', 'pmi_selecao_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria as agências de turismo
/*-----------------------------------------------------------------------------------*/

function pmi_agencia_register() { 
    $labels = array(
			'name' => _x('Agências de turismo', 'agências de turismo'),
			'singular_name' => _x('Agência de turismo', 'agência de turismo'),
			'add_new' => _x('Adicionar agência', 'Nova agência'),
			'add_new_item' => __('Nova agência'),
			'edit_item' => __('Editar agência'),
			'new_item' => __('Nova agência'),
			'view_item' => __('Ver agência'),
			'search_items' => __('Procurar agência'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Agências de turismo'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
       );    
register_post_type( 'agencia' , $args );
}

add_action('init', 'pmi_agencia_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria bares e restaurantes
/*-----------------------------------------------------------------------------------*/

function pmi_restaurante_register() { 
    $labels = array(
			'name' => _x('Bares e restaurantes', 'bares e restaurantes'),
			'singular_name' => _x('Restaurante', 'restaurante'),
			'add_new' => _x('Adicionar restaurante', 'novo restaurante'),
			'add_new_item' => __('Novo restaurante'),
			'edit_item' => __('Editar restaurante'),
			'new_item' => __('Novo restaurante'),
			'view_item' => __('Ver restaurante'),
			'search_items' => __('Procurar restaurante'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Bares e restaurantes'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
    );    
register_post_type( 'restaurante' , $args );
}

add_action('init', 'pmi_restaurante_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria hospedagens
/*-----------------------------------------------------------------------------------*/

function pmi_hospedagem_register() { 
    $labels = array(
			'name' => _x('Hospedagens', 'hospedagens'),
			'singular_name' => _x('Hospedagem', 'hospedagem'),
			'add_new' => _x('Adicionar hospedagem', 'novo hospedagem'),
			'add_new_item' => __('Nova hospedagem'),
			'edit_item' => __('Editar hospedagem'),
			'new_item' => __('Nova hospedagem'),
			'view_item' => __('Ver hospedagem'),
			'search_items' => __('Procurar hospedagem'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Hospedagens'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
       );    
register_post_type( 'hospedagem' , $args );
}

add_action('init', 'pmi_hospedagem_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria atrações naturais
/*-----------------------------------------------------------------------------------*/

function pmi_atracao_register() { 
    $labels = array(
			'name' => _x('Atrações naturais', 'atrações naturais'),
			'singular_name' => _x('Atração natural', 'atração natural'),
			'add_new' => _x('Adicionar atração', 'nova atração'),
			'add_new_item' => __('Nova atração'),
			'edit_item' => __('Editar atração'),
			'new_item' => __('Nova atração'),
			'view_item' => __('Ver atração'),
			'search_items' => __('Procurar atração'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Atrações naturais'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail','author')  
    );    
register_post_type( 'atracao' , $args );
}

add_action('init', 'pmi_atracao_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria pontos turísticos
/*-----------------------------------------------------------------------------------*/

function pmi_ponto_register() { 
    $labels = array(
			'name' => _x('Pontos turísticos', 'pontos turísticos'),
			'singular_name' => _x('Ponto turístico', 'ponto turístico'),
			'add_new' => _x('Adicionar atração', 'nova atração'),
			'add_new_item' => __('Nova atração'),
			'edit_item' => __('Editar atração'),
			'new_item' => __('Nova atração'),
			'view_item' => __('Ver atração'),
			'search_items' => __('Procurar atração'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Pontos turísticos'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail','author')  
    );    
register_post_type( 'ponto-turistico' , $args );
register_taxonomy("categoria-atracao", array("ponto-turistico"), array("hierarchical" => true, "show_ui" => true, "show_in_rest" => true, "show_admin_column" => true, "label" => "Categorias de atração", "singular_label" => "Categoria", "rewrite" => true));

}

add_action('init', 'pmi_ponto_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria roteiros turísticos
/*-----------------------------------------------------------------------------------*/

function pmi_roteiro_register() { 
    $labels = array(
			'name' => _x('Roteiros turísticos', 'roteiros turísticos'),
			'singular_name' => _x('Roteiro turístico', 'roteiro turístico'),
			'add_new' => _x('Adicionar roteiro', 'novo roteiro'),
			'add_new_item' => __('Novo roteiro'),
			'edit_item' => __('Editar roteiro'),
			'new_item' => __('Novo roteiro'),
			'view_item' => __('Ver roteiro'),
			'search_items' => __('Procurar roteiro'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Roteiros turísticos'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail','author')  
    );    
register_post_type( 'roteiro' , $args );
}

add_action('init', 'pmi_roteiro_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria diferenciais do município
/*-----------------------------------------------------------------------------------*/

function pmi_diferencial_register() { 
    $labels = array(
			'name' => _x('Diferenciais', 'diferenciais'),
			'singular_name' => _x('Diferencial', 'diferencial'),
			'add_new' => _x('Adicionar diferencial', 'novo diferencial'),
			'add_new_item' => __('Novo diferencial'),
			'edit_item' => __('Editar diferencial'),
			'new_item' => __('Novo diferencial'),
			'view_item' => __('Ver diferencial'),
			'search_items' => __('Procurar diferencial'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Diferenciais do município'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','author')  
    );    
register_post_type( 'diferencial' , $args );
}

add_action('init', 'pmi_diferencial_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria Telefones úteis
/*-----------------------------------------------------------------------------------*/

function pmi_telefones_uteis_register() { 
    $labels = array(
			'name' => _x('Telefones úteis', 'telefones úteis'),
			'singular_name' => _x('Telefone', 'telefone'),
			'add_new' => _x('Adicionar telefone', 'novo telefone'),
			'add_new_item' => __('Novo telefone'),
			'edit_item' => __('Editar telefone'),
			'new_item' => __('Novo telefone'),
			'view_item' => __('Ver telefone'),
			'search_items' => __('Procurar telefone'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Telefones úteis'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
    );    
register_post_type( 'telefone-util' , $args );
}

add_action('init', 'pmi_telefones_uteis_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria itens do guia escolar
/*-----------------------------------------------------------------------------------*/

function pmi_escola_register() { 
    $labels = array(
			'name' => _x('Unidades educacionais', 'unidades educacionais'),
			'singular_name' => _x('Unidade educacional', 'unidade educacional'),
			'add_new' => _x('Adicionar unidade', 'novo unidade'),
			'add_new_item' => __('Novo unidade'),
			'edit_item' => __('Editar unidade'),
			'new_item' => __('Novo unidade'),
			'view_item' => __('Ver unidade'),
			'search_items' => __('Procurar unidade'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Unidades educacionais'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
    );    
register_post_type( 'escola' , $args );
}

add_action('init', 'pmi_escola_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria associaçoes comunitárias
/*-----------------------------------------------------------------------------------*/

function pmi_associacao_register() { 
    $labels = array(
			'name' => _x('Associações comunitárias', 'associações comunitárias'),
			'singular_name' => _x('Associação', 'associação'),
			'add_new' => _x('Adicionar associação', 'nova associação'),
			'add_new_item' => __('Nova associação'),
			'edit_item' => __('Editar associação'),
			'new_item' => __('Nova associação'),
			'view_item' => __('Ver associação'),
			'search_items' => __('Procurar associação'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Associações comunitárias'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')  
    );    
register_post_type( 'associacao' , $args );
}

add_action('init', 'pmi_associacao_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria unidades de saude
/*-----------------------------------------------------------------------------------*/

function pmi_ubs_register() { 
    $labels = array(
			'name' => _x('Unidades de saúde', 'unidades de saúde'),
			'singular_name' => _x('Unidade de saúde', 'unidade de saúde'),
			'add_new' => _x('Adicionar unidade', 'nova unidade'),
			'add_new_item' => __('Nova unidade'),
			'edit_item' => __('Editar unidade'),
			'new_item' => __('Nova unidade'),
			'view_item' => __('Ver unidade'),
			'search_items' => __('Procurar unidade'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Unidades de saúde'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title','author')
    );    
register_post_type( 'unidade-saude' , $args );
}

add_action('init', 'pmi_ubs_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria cooperativas de taxi
/*-----------------------------------------------------------------------------------*/

function pmi_coop_register() { 
    $labels = array(
			'name' => _x('Cooperativas', 'cooperativas'),
			'singular_name' => _x('Cooperativa', 'cooperativa'),
			'add_new' => _x('Adicionar cooperativa', 'nova cooperativa'),
			'add_new_item' => __('Nova cooperativa'),
			'edit_item' => __('Editar cooperativa'),
			'new_item' => __('Nova cooperativa'),
			'view_item' => __('Ver cooperativa'),
			'search_items' => __('Procurar cooperativa'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Cooperativas'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
        'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array('title','author')  
    );    
register_post_type( 'cooperativa' , $args );
}

add_action('init', 'pmi_coop_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os ofícios
/*-----------------------------------------------------------------------------------*/

function pmi_oficio_register() { 
    $labels = array(
			'name' => _x('Ofícios', 'ofícios'),
			'singular_name' => _x('Ofício', 'ofício'),
			'add_new' => _x('Adicionar ofício', 'Novo ofício'),
			'add_new_item' => __('Novo ofício'),
			'edit_item' => __('Editar ofício'),
			'new_item' => __('Novo ofício'),
			'view_item' => __('Ver ofício'),
			'search_items' => __('Procurar ofício'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Publicações oficiais'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
		'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','author','page-attributes')  
    );    
register_post_type( 'oficio' , $args );
}

add_action('init', 'pmi_oficio_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria os hotsites
/*-----------------------------------------------------------------------------------*/

function pmi_hotsite_register() { 
    $labels = array(
			'name' => _x('Hotsites', 'hotsites'),
			'singular_name' => _x('Hotsite', 'ofício'),
			'add_new' => _x('Adicionar hotsite', 'Novo hotsite'),
			'add_new_item' => __('Novo hotsite'),
			'edit_item' => __('Editar hotsite'),
			'new_item' => __('Novo hotsite'),
			'view_item' => __('Ver hotsite'),
			'search_items' => __('Procurar hotsite'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Hotsites / OnePages'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,  
		'show_ui' => true,
		'show_in_rest' => true,  
        'capability_type' => 'page',  
        'hierarchical' => false,  
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 5,
        'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => true,
        'supports' => array( 'title', 'editor','thumbnail')  
       );    
register_post_type( 'hotsite' , $args );
}
register_taxonomy("area-interesse", array("hotsite"), array("hierarchical" => true, "label" => "Áreas de interesse", "singular_label" => "Área de interesse", "rewrite" => true));

add_action('init', 'pmi_hotsite_register');

/*-----------------------------------------------------------------------------------*/
/*	Cria carta de serviços
/*-----------------------------------------------------------------------------------*/

function pmi_servico_register() { 
    $labels = array(
			'name' => _x('Serviços', 'serviços'),
			'singular_name' => _x('Serviço', 'serviço'),
			'add_new' => _x('Adicionar serviço', 'novo serviço'),
			'add_new_item' => __('Novo serviço'),
			'edit_item' => __('Editar serviço'),
			'new_item' => __('Novo serviço'),
			'view_item' => __('Ver serviço'),
			'search_items' => __('Procurar serviço'),
			'not_found' =>  __('Nenhum valor encontrado'),
			'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
			'parent_item_colon' => '',
			'menu_name' => 'Carta de Serviços'
		);

    $args = array(  
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
		'show_in_rest' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'menu_position' => 25,
        'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail','author','page-attributes')  
    );    
register_post_type( 'servico' , $args );
register_taxonomy("grupo", array("servico"), array("hierarchical" => true, "show_ui" => true, "show_in_rest" => true, "show_admin_column" => true, "label" => "Grupo", "singular_label" => "grupo", "rewrite" => true));
register_taxonomy("tema", array("servico"), array("hierarchical" => true, "show_ui" => true, "show_in_rest" => true, "show_admin_column" => true, "label" => "Tema", "singular_label" => "tema", "rewrite" => true));
}

add_action('init', 'pmi_servico_register');