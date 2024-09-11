<?php 

  
  if( function_exists('acf_add_options_page') ) {  
    acf_add_options_page();
  }

  require_once get_template_directory() . '/inc/acf_fields/register-options-page-fields.php';


  require_once get_template_directory() . '/inc/acf_fields/register-button-fields.php';
  
  require_once get_template_directory() . '/inc/acf_fields/register-media-page-fields.php';

  require_once get_template_directory() . '/inc/acf_fields/register-city-cpt-and-fields.php';

  require_once get_template_directory() . '/inc/acf_fields/register-people-cpt-and-fields.php';