<?php

if ( ! function_exists( 'pagination' ) ) :
    function pagination( $paged = '', $max_page = '' )
    {
        $big = 999999999; // need an unlikely integer
        if( ! $paged )
            $paged = get_query_var('paged');
        if( ! $max_page )
            $max_page = $wp_query->max_num_pages;

        echo paginate_links( array(
            'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link( $big ))),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 2,
            'prev_text'  => __('«'),
            'next_text'  => __('»'),
            'type'       => 'list'
        ) );
    }
endif;

if ( ! function_exists( 'ajax_pagination' ) ) :
    function ajax_pagination() {
        global $wp_query;
        $cpt = get_post_type();
        if ($wp_query->max_num_pages > 1) {
            echo '<a class="btn text-center loadmore w-100" data-page="2" cpt="'.$cpt.'">'.__('Carrega mais', 'pmi').'</a>';
        }
    }
endif;
