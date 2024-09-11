<?php 
  if( !function_exists( '_ehd_menu_setup')) {
    function _ehd_menu_setup() {
      // This theme uses wp_nav_menu() in one location.
      register_nav_menus( array(
			  'main-menu' => esc_html__( 'Primary', '_ehd_theme' ),
      ) );
    }
  }

  add_action( 'after_setup_theme', '_ehd_menu_setup' );