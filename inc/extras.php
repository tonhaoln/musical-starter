<?php
  // Move Yoast to bottom
  add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

  // This filter to disable the default admin notification automatically generated for new forms.
  add_filter( 'gform_default_notification', '__return_false' );

  // echo our varibles or objects for debugging
  function showme($var) {
    echo '<pre><code>';
      print_r($var);
    echo '</code></pre>';
  }

  // place SVG inline
  function include_svg($svg_name){
    $svg = $svg_name.'.svg';
    get_template_part('dist/svgicons/inline', $svg);
  }

  // Take a string and turn it into a slug for anchor links
  function text_to_anchor($input) {
    $text = strtolower($input);
    $text = str_replace(' ', '-', $text);
    $text = preg_replace('/[^a-z0-9\-]/', '', $text);
    $text = preg_replace('/-+/', '-', $text);
    
    return $text;
  }

  // Disable the fullscreen editor by default - Matt doesn't like it
  if (is_admin()) {
    function jba_disable_editor_fullscreen_by_default() {
      $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
      wp_add_inline_script( 'wp-blocks', $script );
    }

    add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );
  }