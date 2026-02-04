<html lang="pt_BR">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('pmi'); ?>>
<?php if (!wp_is_mobile()) { ?>
    <div class="container-fluid" id="intraaccess">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 navbar p-0">
                    <span>Ir para</span>
                    <?php
                        get_template_part( 'assets/nav/nav_goto' ); 
                        get_template_part( 'assets/nav/nav_access' );
                        get_template_part( 'assets/nav/nav_social' );
                        echo '<span class="data">'.wp_date( 'j \d\e F \d\e Y' ).'</span>';
                        
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
<?php } else { ?>
<div class="container-fluid" id="topmobile">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part( 'assets/nav/nav_mobile_top' ); ?>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" id="pagetop">

        <div class="container">

            <div class="row">

                <div class="col-12 py-1 d-flex flex-row">

                    <?php the_custom_logo(); ?>

                    <?php get_template_part( 'assets/nav/nav_mobile_main' ); ?>
                </div>

            </div>

        </div>

</div>
<?php } ?>
   
                </div>
            </div>
        </div>
    </div>
    
    <?php $object = get_queried_object( ); ?>