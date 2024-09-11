<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_gallery-list_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249agallery-list',
	'title' => 'Gallery List',
	'fields' => array(
    array(
      'key' => $key.'galleries',
      'label' => 'Galleries',
      'name' => 'galleries',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'block',
      'button_label' => 'Add item',
      'collapsed' => $key.'title',
      'sub_fields' => array(
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
        ),
        array(
          'key' => $key.'title',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'parent' => '',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array(
          'key' => $key.'subtitle',
          'label' => 'Subtitle',
          'name' => 'subtitle',
          'type' => 'text',
          'parent' => '',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
      ),
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/gallery-list',
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



function ehd_enqueue_ehd_gallery_list() {
  wp_register_script( 
    'ehd-gallery-list-js', 
    get_template_directory_uri() . '/dist/js/gallery-list.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_gallery_list' );