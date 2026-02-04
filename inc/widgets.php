<?php 
register_sidebar(array(
    'name' => __('Rodapé', 'pmi'),
    'id' => 'footer',
    'before_widget' => '<div class="col-sm-12 col-md-6 col-lg-4">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
));
register_sidebar(array(
    'name' => __('Serviços em destaque', 'pmi'),
    'id' => 'destaque_servicos',
    'before_widget' => '<div class="col-sm-12 col-md-8 col-lg-8 mx-auto %s" id="%s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
));
register_sidebar(array(
    'name' => __('Newsletter', 'pmi'),
    'id' => 'newsletter',
    'before_widget' => '<div class="col-sm-12 col-md-6 col-lg-6 mx-auto %s" id="%s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title text-center">',
    'after_title' => '</h6>',
));
register_sidebar(array(
    'name' => __('Sidebar', 'pmi'),
    'id' => 'sidebar',
    'before_widget' => '<div class="col-sm-12 %s" id="%s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
));
register_sidebar(array(
    'name' => __('Turismo', 'pmi'),
    'id' => 'turismo',
    'before_widget' => '<div class="main_turismo %s" id="%s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
));