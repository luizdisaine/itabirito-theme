<?php

function pmi_enqueue_styles() {
    // Carrega a folha de estilo principal.
	wp_enqueue_style( 'pmi-styles', get_stylesheet_uri() );
	// Carrega função para Google Fonts abaixo
	//wp_enqueue_style( 'pmi-fonts', 'https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap', array(), null );    
	// Carrega Bootstrap CSS
	wp_enqueue_style( 'b5-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), null );
	// Carrega OWL THEME
	wp_enqueue_style( 'owl-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), null );
	wp_enqueue_style( 'owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css', array(), null );
	// Carrega CSS Fontawesome
	wp_enqueue_style( 'fa-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css', array(), null );
	// Carrega Roboto Monospace
	wp_enqueue_style( 'roboto-mono', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap', array(), null );
	// Carrega A2HS Phil Fung
	wp_enqueue_style( 'a2hs', 'https://cdn.jsdelivr.net/gh/philfung/add-to-homescreen@3.5/dist/add-to-homescreen.min.css', array(), null );
	

	//Scripts
	// Evita a carga do jQuery padrão (Online)
	wp_deregister_script('jquery');
	// Carrega jQuery local
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), null, false);
	wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array(), null, false);
	// Carrega Bootstrap JS
	wp_enqueue_script('b5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', array(), null, true);
	// Carrega Owl Carousel JS
	wp_enqueue_script('owl-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), null, false);
	// Carrega PrimaryColor
	wp_enqueue_script('color', get_template_directory_uri().'/js/jquery.primarycolor.js', array(), null, false);
	wp_enqueue_script('snowfall', get_template_directory_uri().'/js/snowfall.jquery.min.js', array(), null, false);
	wp_enqueue_script('sheet', get_template_directory_uri().'/js/sheetrock.min.js', array(), null, false);
	// Carrega  A2HS JS Phil Fung
	wp_enqueue_script('a2hs-js', 'https://cdn.jsdelivr.net/gh/philfung/add-to-homescreen@3.5/dist/add-to-homescreen_pt.min.js', array(), null, false);
	
	// Carrega CUSTOM
	wp_enqueue_script('print', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js', array(), null, false);
	wp_enqueue_script('fa-js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js', array(), null, false);
	wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js', array(), null, true);

	wp_enqueue_script('ajax_js', get_stylesheet_directory_uri() . '/js/ajax.js', array(), null, false);
	wp_localize_script('ajax_js', 'ajax_post', array('ajaxurl' => admin_url('admin-ajax.php')));
    
}
add_action( 'wp_enqueue_scripts', 'pmi_enqueue_styles' );

function pmi_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/pmi_login.css' );
    //wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'pmi_login_stylesheet' );

function pmi_admin_stylesheet() {
	wp_enqueue_style('custom-admin', get_stylesheet_directory_uri() . '/css/pmi_admin.css');
}

add_action( 'admin_enqueue_scripts', 'pmi_admin_stylesheet' );

/*
	 * Permite que o WP mostre o título do documento*/
	add_theme_support( 'title-tag' );


	// Determina os tamanhos das imagens
    add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 260, 260, true );
	add_image_size( 'noticia-home', 300, 200, true);
	add_image_size( 'news-img', 540, 360, true );
	add_image_size( 'feature', 900, 400, true );
	add_image_size( 'slide', 795, 395, true );
	add_image_size( 'img-descubra', 300, 252, true);

	/*
	 * Habilita logotipo personalizado.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 73,
		'width'       => 215,
		'flex-height' => true,
	) );
	
	add_post_type_support( 'page', 'excerpt' );


function custom_type_archive_display($query) {
	$infinite_archive = ['restaurante', 'agencia', 'hospedagem', 'roteiro', 'ponto-turistico', 'atracao', 'associacao', 'escola', 'telefone-util', 'cooperativa','secretaria', 'glossario'];
	if (is_post_type_archive($infinite_archive)) {
		$query->set('posts_per_page', -1);
        $query->set('orderby', 'name' );
        $query->set('order', 'ASC' );
        return;
    }     
}
add_action('pre_get_posts', 'custom_type_archive_display');

function pmi_custom_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'pmi_custom_excerpt_length' );


// Carrega os includes para outras funções

require_once( __DIR__ . '/inc/menu.php');
require_once( __DIR__ . '/inc/class-wp-bootstrap-navwalker.php');
require_once( __DIR__ . '/inc/pagination.php');
require_once( __DIR__ . '/inc/post_types.php');
require_once( __DIR__ . '/inc/widgets.php');
require_once( __DIR__ . '/inc/show_id.php');
require_once( __DIR__ . '/inc/disable_default.php');
require_once( __DIR__ . '/inc/custom_taxonomies.php');
require_once( __DIR__ . '/inc/breadcrumbs.php' );
require_once( __DIR__ . '/inc/left-column.php');
require_once( __DIR__ . '/inc/menu_shortcode.php');
require_once( __DIR__ . '/inc/helper.php');
require_once( __DIR__ . '/inc/ajax.php');
require_once( __DIR__ . '/inc/qr_code_automation.php');
require_once( __DIR__ . '/inc/forms/rh.php');
require_once( __DIR__ . '/inc/forms/saude.php');
require_once( __DIR__ . '/inc/forms/cultura.php');
require_once( __DIR__ . '/inc/forms/meio.php');



function wpza_replace_repeater_field( $where ) {
	$where = str_replace( "meta_key = 'datas_$", "meta_key LIKE 'datas_%", $where );
	return $where;
}
add_filter( 'posts_where', 'wpza_replace_repeater_field' );

function sort_by_modified( $wp_query ) {
		global $pagenow;
		if ( is_admin() && 'edit.php' == $pagenow) {
			$post_type = $wp_query->query['post_type'];
			if ($post_type == 'noticia') {
			$wp_query->set( 'orderby', 'date' );
			$wp_query->set( 'order', 'DESC' );
			}
		}
	}
add_filter('pre_get_posts', 'sort_by_modified' );

/**
 * Deal with the custom RSS templates.
 **/
function my_custom_rss() {
	if ( 'noticia' === get_query_var( 'post_type' ) ) {
		get_template_part( 'feed', 'noticia' );
	} else {
		get_template_part( 'feed', 'rss2' );
	}
}
remove_all_actions( 'do_feed_rss2' );
add_action( 'do_feed_rss2', 'my_custom_rss', 10, 1 );

?>