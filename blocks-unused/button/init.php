<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_button_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249abuttons',
	'title' => 'buttons',
	'fields' => array(
    array(
      'key' => $key.'buttons',
      'label' => 'Buttons',
      'name' => 'buttons',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'block',
      'button_label' => 'Add button',
      'sub_fields' => array(
        array(
          'key' => $key.'button_link',
          'label' => 'Button',
          'name' => 'button_link',
          'type' => 'link',
        ),
        array(
          'key' => $key.'button_type',
          'label' => 'Type',
          'name' => 'button_type',
          'type' => 'button_group',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'choices' => array(
            'button-primary' => 'Primary',
            'button-secondary' => 'Secondary',
            'button-tertiary' => 'Tertiary',
            'button-quaternary' => 'Quaternary',
          ),
          'allow_null' => 0,
          'default_value' => 'padding-none',
          'layout' => 'vertical',
          'return_format' => 'value',
        ),
      ),
    ),
    array(
      'key' => $key.'vertical_alignment',
      'label' => 'Vertical Alignment (Desktop)',
      'name' => 'vertical_alignment',
      'type' => 'button_group',
      'instructions' => '(Space Between and Space Evenly only work with Row orientation)',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'flex-left' => 'Left',
        'flex-center' => 'Center',
        'flex-right' => 'Right',
        'flex-space-between' => 'Space Between',
        'flex-space-evenly' => 'Space Evenly'
      ),
      'allow_null' => 0,
      'default_value' => 'flex-center',
      'layout' => 'vertical',
      'return_format' => 'value',
    ),
    array(
      'key' => $key.'vertical_alignment_mobile',
      'label' => 'Vertical Alignment (Mobile)',
      'name' => 'vertical_alignment_mobile',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'flex-left-mob' => 'Left',
        'flex-center-mob' => 'Center',
        'flex-stretch-mob' => 'Stretch'
      ),
      'allow_null' => 0,
      'default_value' => 'flex-stretch-mob',
      'layout' => 'vertical',
      'return_format' => 'value',
    ),
    array(
      'key' => $key.'horizontal_alignment',
      'label' => 'Horizontal Orientation ',
      'name' => 'horizontal_alignment',
      'type' => 'button_group',
      'instructions' => 'Should the buttons be in a row or a column on Desktop? (Mobile is always a column)',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'flex-row' => 'Row',
        'flex-column' => 'Column',
      ),
      'allow_null' => 0,
      'default_value' => 'flex-row',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/button',
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



function ehd_enqueue_ehd_buttons() {
  wp_register_script( 
    'ehd-buttons-js', 
    get_template_directory_uri() . '/dist/js/buttons.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_buttons' );