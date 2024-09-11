<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_page-header_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249apage-header',
	'title' => 'Page Header',
	'fields' => array(
    array(
      'key' => $key.'page_title',
      'label' => 'Use Page Title',
      'name' => 'page_title',
      'type' => 'true_false',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'message' => 0,
    ),
    array(
      'key' => $key.'page_heading',
      'label' => 'Heading',
      'name' => 'page_heading',
      'type' => 'text',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'page_title',
            'operator' => '==',
            'value' => '0',
          ),
        ),
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array(
      'key' => $key.'text',
      'label' => 'Text',
      'name' => 'text',
      'type' => 'textarea',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => 'wpautop',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array(
      'key' => $key.'background_image',
      'label' => 'Background Image',
      'name' => 'background_image',
      'type' => 'image',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'return_format' => 'array',
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
				'value' => 'ehd/page-header',
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



function ehd_enqueue_ehd_page_header() {
  wp_register_script( 
    'ehd-page-header-js', 
    get_template_directory_uri() . '/dist/js/page-header.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_page_header' );