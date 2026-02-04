<html lang="pt_BR">

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0277B1" />
    <meta property="og:url" content="<?php the_permalink(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?>" />
    <meta property="og:image" content="<?php the_post_thumbnail_url('large'); ?>" />
    <?php if (is_page('descubra-itabirito')) { ?>
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
    <?php } ?>
    <?php wp_head();    
    
    if(get_field('background-image','options')) {
        $options = get_field('bg_options','options');
        $bgcolor = get_field('background-color','options');
        $whatsnew = get_field('whatsnew','options');
        echo '<style type="text/css" id="custom_header">';
        echo '#maintop {background-image: url('.get_field("background-image","options")["url"].') !important;';
        if ($options) {
            echo 'background-repeat: '.$options['background-repeat'].';';
            echo 'background-position: '.$options['background-position'].';';
            echo 'background-blend-mode: '.$options['background-blend-mode'].';';
            echo 'background-size: '.$options['background-size'].';';
            if ($bgcolor) {
                echo 'background-color: '.$bgcolor.';';
            }
        }
        echo '}';
        if ($whatsnew) {
            echo '.whatsnew {background-color: '.$whatsnew.'!important }';
        }
        echo '</style>';
    }

    ?>


</head>

<body <?php body_class('pmi'); ?>>

    <?php if (!is_page('descubra-itabirito') && !is_descendant(get_page_by_path('descubra-itabirito')->ID) && !is_post_type_archive(['ponto-turistico','atracao']) && !is_singular(['ponto-turistico','atracao'])) { ?>
    <div class="container-fluid" id="topmobile">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php get_template_part( 'assets/nav/nav_mobile_top' ); ?>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>

    <div class="container-fluid" id="pagetop">
        <div class="container">
            <div class="row">
                <div class="col-12 py-1 d-flex flex-row">
                    <?php 
                        the_custom_logo(); 
                        get_template_part( 'assets/nav/nav_mobile_main' );
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php if(is_page('descubra-itabirito')) { ?>
    <div class="container-fluid bg-azul" id="turismo_header">
        <div class="row mt-5 text-center">
            <div class="col-lg-12">
                <h1 class="mt-1"><span><?php _e('Descubra', 'pmi'); ?></span> <?php _e('Itabirito', 'pmi'); ?></h1>
            </div>
        </div>
        <div class="row">
            <?php } elseif (is_descendant(get_page_by_path('descubra-itabirito')->ID) OR is_post_type_archive(['ponto-turistico','atracao']) OR is_singular(['ponto-turistico','atracao'])) { ?>
            <div class="container-fluid turismo_back">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-row p-0 align-items-center">
                        <a href="javascript:history.back()" class="back"><i class="fa-solid fa-angle-left"></i></a>
                        <h1><a href="<?php echo get_permalink(get_page_by_path('descubra-itabirito')); ?>"><span><?php _e('Descubra ', 'pmi'); ?></span><?php _e('Itabirito', 'pmi'); ?></a></h1>
                    </div>
                </div>
            </div>
            <?php echo '<h1 class="mx-3 mt-1">';
                wp_title();
                echo '</h1>';
              } else { ?>
            <div class="container-fluid bg-azul">
                <div class="row">
                    <?php } 
                        if(!is_descendant(get_page_by_path('descubra-itabirito')->ID) && !is_post_type_archive( ['ponto-turistico','atracao'] ) && !is_singular( ['ponto-turistico','atracao'] )) { 
                        echo '<div class="col-10 mx-auto bg-azul d-flex">';
                        get_search_form();
                        } ?>
                    </div>
                </div>
            </div>

            <?php if (is_front_page()) {
                get_template_part('assets/frontpage/banner-superior');
                get_template_part('assets/frontpage/destaque-noticias');
            }               
                $object = get_queried_object( ); ?>