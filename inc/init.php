<?php
  /**
  * Theme Setup
  * ========================================================================
  * theme-setup.php
  * @version      1.0 | Oct 22nd 2014
  * @package      WordPress
  * @subpackage  BlockHead
  * @since       BlockHead v1.0
  *
  * For more information:
  * https://developer.wordpress.org/reference/hooks/after_setup_theme/
  */

  class BlockHead_Setup {
      public function __construct()
      {

          // Run the Setup
          add_action('after_setup_theme', array(&$this, 'initial_theme_setup'));
      }

      /**
      * Initial Theme Setup
      *
      * @param null
      */

      public function initial_theme_setup()
      {

          /**
          * Only need to run this once
          */
          if (get_option('blockhead_theme_setup_status') !== '1') {

              /**
              * Set the WordPress options the way you like
              *
              * Initial images sizes increased by 25% for looking pretty damn good
              * natively on retina.
              */
              $core_settings = array(
                  'avatar_default'    => 'mystery',
                  'avatar_rating'     => 'G',
                  'blog_public'       => '0',
                  'blogdescription'   => '',
                  'comments_per_page' => '0',
                  'date_format'       => 'd/m/Y',
                  'default_role'      => 'author',
                  'posts_per_page'    => '20',
                  'thumbnail_crop'    => '1',
                  'time_format'       => 'g:i a',
                  'timezone_string'   => 'Australia/Sydney',
                  'use_smilies'       => '0'
              );

              foreach ($core_settings as $key => $value) {
                  update_option($key, $value);
              }


              global $wp_rewrite; 

              //Write the rule
              $wp_rewrite->set_permalink_structure('/%postname%/'); 

              //Set the option
              update_option( "rewrite_rules", FALSE ); 

              //Flush the rules and tell it to write htaccess
              $wp_rewrite->flush_rules( true );

              /**
              * Add RSS links to <head> section
              */
              add_theme_support('automatic-feed-links');

              /**
              * Delete the example post, page and comment
              * ========================================================================
              * Set the booleans to false if this is not a fresh
              * install, true will delete the post and pages for real realz
              */
              wp_delete_post(1, true);
              wp_delete_post(2, true);
              wp_delete_comment(1);


              /**
              * Goodbye Dolly
              * ========================================================================
              * feel free to add Akismet to this block of code
              */
              if (file_exists(WP_PLUGIN_DIR.'/hello.php')) {
                  require_once(ABSPATH . 'wp-admin/includes/plugin.php');
                  require_once(ABSPATH . 'wp-admin/includes/file.php');
                  delete_plugins(array('hello.php'));
              }


              /**
              * Update the status so this doesn't run again
              */
              update_option('blockhead_theme_setup_status', '1');

          }
      }
  }

  new BlockHead_Setup;