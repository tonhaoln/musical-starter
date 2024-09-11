<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'button-fields_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249a-button-fields',
	'title' => 'Button Fields',
	'fields' => array(
    array(
      'key' => $key.'type',
      'label' => 'Type',
      'name' => 'type',
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
    )
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'core/buttons',
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