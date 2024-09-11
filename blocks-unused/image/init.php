<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_acf_image_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249aimage',
	'title' => 'Image',
	'fields' => array(
    array(
      'key' => 'block_image_image',
      'label' => 'Image',
      'name' => 'image',
      'type' => 'image',
      'return_format' => 'array',
      'preview_size' => 'medium',
      'library' => 'all',
      'min_width' => 0,
      'max_width' => 0,
      'min_height' => 0,
      'max_height' => 0,
      'min_size' => 0,
      'max_size' => 0,
      'mime_types' => ''
    ),
    array(
      'key' => $key.'image_size',
      'label' => 'Image Size',
      'name' => 'image_size',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'full' => 'Full',
        'large' => 'Large',
        'medium' => 'Medium',
        'feature-thumb' => 'Feature',
        'feature-square' => 'Feature Square',
        'thumbnail' => 'Thumbnail',
      ),
      'allow_null' => 0,
      'default_value' => 'full',
      'layout' => 'vertical',
      'return_format' => 'value',
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/image',
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