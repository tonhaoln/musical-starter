<?php 

  function ehd_get_block_additional_meta( $block ) {
    if ( empty( $block['anchor'] ) ) {
        return '';
    } else {
        // Escape the anchor attribute to ensure valid HTML and prevent XSS attacks.
        $anchor = 'id="' . esc_attr( $block['anchor'] ) . '"';
        return $anchor;
    }
  }

    function ehd_get_block_meta( $block, $is_preview,  $class = '' ) {
    $block_additional_meta = ehd_get_block_additional_meta( $block );

    $classes = ['wrapper', $class];
    if ($is_preview) {
      $classes[] = 'is-preview';
    }

    $wrapper_attributes = get_block_wrapper_attributes(
      [
        'class' => implode(' ', $classes)
      ]
    );
    return $wrapper_attributes. ' '.$block_additional_meta;
  }

  // load block stylesheets seperately
  // add_filter( 'should_load_separate_core_block_assets', '__return_true' );

  // Get rid of standard blocks:

  // Frontend
  // function prefix_remove_core_block_styles() {
	//   wp_dequeue_style( 'wp-block-buttons' );
	//   wp_dequeue_style( 'wp-block-button' );
  // }
  // add_action( 'wp_enqueue_scripts', 'prefix_remove_core_block_styles' );


  