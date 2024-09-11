<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_image-gallery_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249aimage-gallery',
	'title' => 'Image Gallery',
	'fields' => array(
    array(
      'key' => $key.'gallery',
      'label' => 'Gallery',
      'name' => 'gallery',
      'type' => 'gallery',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'min' => 0,
      'max' => 0,
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => 0,
      'min_height' => 0,
      'min_size' => 0,
      'max_width' => 0,
      'max_height' => 0,
      'max_size' => 0,
      'mime_types' => '',
    )
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/image-gallery',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
  ) );
} );

function ehd_enqueue_image_gallery() {
  wp_register_script( 
    'image-gallery-js', 
    get_template_directory_uri() . '/dist/js/image-gallery.js', 
    array('fancybox-js','jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_image_gallery' );