<?php
function ehd_register_assets(){
  wp_register_script( 
    'fancybox-js', 
    get_template_directory_uri() . '/dist/js/fancybox.js', 
    array('jquery'), 
    '2.2', 
    true 
  );

  wp_register_style( 
    'fancybox-css', 
    get_template_directory_uri() . '/dist/css/fancybox.css'
  );
}

add_action('enqueue_block_assets', 'ehd_register_assets');