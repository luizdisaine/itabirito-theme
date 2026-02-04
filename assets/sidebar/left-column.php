<?php
    if (is_post_type_archive()) { ?>
    <h6 class="col_title"><?php wp_title(''); ?></h6> 
<?php }

$args = array( 'hide_empty=0' );
 
$terms = get_terms( 'categoria_noticia', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="my_term-archive">';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
        if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}
?>