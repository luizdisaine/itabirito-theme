<?php 
function print_menu_shortcode($atts, $content = null) {
extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'sitemap', 'echo' => false ) );
}

add_shortcode('menu', 'print_menu_shortcode');
?>