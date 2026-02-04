<html lang="pt_BR">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php if (is_front_page()) {
    echo '<meta http-equiv="refresh" content="180">';
} ?>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php if (is_front_page()) { bloginfo('name'); echo ' | '; bloginfo( 'description' ); } else { bloginfo('name'); echo ' | '; single_post_title(); } ?></title>
<meta name="viewport" content="width=1, initial-scale=1.0">
<meta name="theme-color" content="#0277B1" />
<meta property="og:url"           content="<?php the_permalink(); ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php the_title(); ?>" />
<meta property="og:description"   content="<?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>" />
<meta property="og:image"         content="<?php the_post_thumbnail_url('large'); ?>" />
    <?php wp_head();
        
    if(get_field('background-image','options')) {
        $options = get_field('bg_options','options');
        $bgcolor = get_field('background-color','options');
        $whatsnew = get_field('whatsnew','options');
        echo '<style type="text/css" id="custom_header">';
        echo '#maintop {background-image: url('.get_field("background-image","options")["url"].') !important;';
        if ($options) {
            echo 'background-repeat: '.$options['background-repeat'].';';
            echo 'background-position'.$options['background-position'].';';
            echo 'background-blend-mode: '.$options['background-blend-mode'].';';
            echo 'background-size: '.$options['background-size'].';';
            if ($bgcolor) {
                echo 'background-color: '.$bgcolor.' !important;';
            }
        }
        echo '}';
        if ($whatsnew) {
            echo '.whatsnew {background-color: '.$whatsnew.'!important }';
        }
        echo '</style>';
    }
    ?>

<div class="modal fade print_preview" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header bg-dark">
        <h5 class="modal-title text-white">Visualizar impressão</h5>
        <button type="button" class="btn btn-outline-light printThis ms-auto" aria-label="Imprimir">
            <span>Imprimir</span><i class="fas fa-print ms-1"></i>
        </button>
        <button type="button" class="btn text-white" data-bs-dismiss="modal" aria-label="Fechar">
        <i class="fas fa-times-circle"></i>
        </button>
    </div>
    <div class="modal-body">
        
    </div>
    </div>
</div>
</div>
</head>
<body <?php body_class('pmi'); ?>>
<div class="container-fluid" id="intraaccess">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 navbar p-0">
                    <span>Ir para</span>
                    <?php
                        get_template_part( 'assets/nav/nav_goto' ); 
                        get_template_part( 'assets/nav/nav_access' );
                        echo '<span class="data">'.wp_date( 'j \d\e F \d\e Y' ).'</span>';
                        //get_template_part( 'assets/nav/nav_social' );
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="pagetop">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex">
                    <?php the_custom_logo(); ?>
                    <?php get_template_part('assets/nav/nav_main'); ?>
                </div>
                <div class="col-lg-6">
                <?php get_template_part('assets/nav/nav_inst') ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (is_front_page()) { 
        get_template_part('assets/frontpage/banner-superior');
        echo '<div class="container-fluid whatsnew">
            <div class="container">
            <div class="row">';
        echo '<div class="col-lg-9 mx-auto d-flex"><span class="d-block my-auto text-white me-3">';
        _e('Novidades na Prefeitura','pmi');
        echo '</span>';
        get_template_part( 'assets/nav/nav_season' );
        echo '</div><div class="col-lg-3 d-flex flex-column">';
        get_template_part( 'assets/nav/nav_social' );
        echo '</div>';
    } else {
        echo '<div class="container-fluid bg-search py-1">
            <div class="container">
            <div class="row">';
        echo '<div class="col-lg-6 mx-auto d-flex">';
        get_search_form();
        echo '</div>';
        }
    ?>    
                </div>
            </div>
        </div>
    </div>
    
    <?php $object = get_queried_object( ); ?>
    <?php if (!is_404()) { the_breadcrumb(); } ?>