<?php
  /**
  * Define GLOBAL variables
  */

  require_once get_template_directory() . '/inc/globals.php';

  /**
  * Theme Initialisation
  */

  require_once get_template_directory() . '/inc/init.php';

   require_once get_template_directory() . '/inc/extras.php';
   require_once get_template_directory() . '/inc/disable-comments.php';
   require_once get_template_directory() . '/inc/footer-blocks.php';
   require_once get_template_directory() . '/inc/menus.php';

   // Enqueue Assets
  require_once get_template_directory() . '/inc/enqueue-assets.php';

  // INCLUDE ACF PRO

  define( 'ACF_PRO_LICENSE', 'b3JkZXJfaWQ9MzIyNzF8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA3IDAzOjQwOjI1' );

if( !function_exists( '_ehd_theme_setup')) {
  function _ehd_theme_setup() {

    // Add theme support for things we need:
    add_theme_support( 'title-tag' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'align-full' );
    add_theme_support( 'post-thumbnails' );

    // add_image_size( 'name-of-size', width, height, cropped (true or false) );
    // e.g.
    add_image_size( 'feature-thumb', 1280, 720, true ); // 16 by 9 image crop 1280 x 720
    add_image_size( 'feature-thumb-small', 640, 360, true ); // 16 by 9 image crop 
    add_image_size( 'feature-square', 600, 600, true ); // 16 by 9 image crop 

    // For development purposes only, don't inline the styles (for now).	
    add_filter( 'styles_inline_size_limit', '__return_zero' );

    /*
		 * Remove WordPress default custom field metabox
		 *
		 * @link https://www.advancedcustomfields.com/blog/acf-pro-5-5-13-update/
		 */
    add_filter('acf/settings/remove_wp_meta_box', '__return_true');
    }
}
add_action( 'after_setup_theme', '_ehd_theme_setup' );

  

    function _blockhead_assets() {  
      wp_enqueue_style( 'blockhead-stylesheet', get_template_directory_uri() . '/dist/css/main.css', array(), 'all' );

      wp_enqueue_script( 'blockhead-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), true );
    
    }
    add_action('wp_enqueue_scripts', '_blockhead_assets');

    function ehd_theme_add_editor_styles() {
      add_theme_support('editor-styles');
      add_editor_style('dist/css/editor.css');
    }
    add_action('after_setup_theme', 'ehd_theme_add_editor_styles');

  function ehd_block_editor_assets() {
    wp_register_script(
        'ehd-block-editor-script', 
        get_template_directory_uri() . '/dist/js/ehd-editor.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( get_template_directory() . '/dist/js/ehd-editor.js' ),
        true
    );

    wp_enqueue_script( 'ehd-block-editor-script' );
  }

  add_action( 'enqueue_block_editor_assets', 'ehd_block_editor_assets' );


require_once get_template_directory() . '/inc/hide-blocks-with-toggle.php';
  


require_once get_template_directory() . '/inc/block-functions.php';

// require get_template_directory() . '/components/home_header.php';
if (class_exists('ACF')) {
  if( function_exists('acf_add_options_page') ) {  
    acf_add_options_page();
  }

  require_once get_template_directory() . '/inc/acf_fields/index.php';

  // Functionality.
  require_once get_template_directory() . '/inc/blocks-init.php';

  require_once get_template_directory() . '/inc/core-block-styles.php';

  require_once get_template_directory() . '/inc/block-patterns.php';


  // Block classes / Styles and Anchor functions
  

  // Video Functions
  require_once get_template_directory() . '/inc/video-functions.php';

  // Enqueue Assets
  require_once get_template_directory() . '/inc/enqueue-assets.php';


}
