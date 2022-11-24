<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'kadence-global','kadence-header','kadence-content','kadence-footer' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );


// END ENQUEUE PARENT ACTION

add_shortcode('menu', 'print_menu_shortcode');
function print_menu_shortcode($atts=[], $content = null) {
  $shortcode_atts = shortcode_atts([ 'name' => '', 'class' => '' ], $atts);
  $name   = $shortcode_atts['name'];
  $class  = $shortcode_atts['class'];
  return wp_nav_menu( array( 'menu' => $name, 'menu_class' => $class, 'echo' => false ) );
}


add_action('admin_head', 'admin_css');

function admin_css() {
  echo '<style>
.dws-dashboard-widget ul, .dws-dashboard-widget ol {
	margin-left: 10px;
}
#dws-notes-user .dws-notes-user-note br {
display: inline !important;
}
.dws-dashboard-widget ul {
  list-style-type: disc;
}
</style>';
}