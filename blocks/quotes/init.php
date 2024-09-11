<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_quotes_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249aquotes',
	'title' => 'Quotes',
	'fields' => array(
    array(
      'key' => $key.'quotes_type',
      'label' => 'Quotes Type',
      'name' => 'quotes_type',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'quotes-carousel' => 'Carousel',
        'quotes-list' => 'List',
      ),
      'allow_null' => 0,
      'default_value' => 'quotes-carousel',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
    array(
      'key' => $key.'quotes',
      'label' => 'Quotes',
      'name' => 'quotes',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'block',
      'button_label' => 'Add Quote',
      'sub_fields' => array(
        array(
          'key' => $key.'quote',
          'label' => 'Quote',
          'name' => 'quote',
          'type' => 'textarea',
          'parent' => '',
          'instructions' => '',
          'required' => 1,
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
          'key' => $key.'source',
          'label' => 'Source',
          'name' => 'source',
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
          'key' => $key.'show_quotes',
          'label' => 'Show Quotes',
          'name' => 'show_quotes',
          'type' => 'true_false',
          'parent' => '',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => 1,
          'message' => 0,
          'wrapper' => array (
            'width' => '25%',
            'class' => '',
            'id' => '',
            ),
        )
      ),
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/quotes',
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



function ehd_enqueue_ehd_quotes() {
  wp_register_script( 
    'ehd-quotes-js', 
    get_template_directory_uri() . '/dist/js/quotes.js', 
    array('fancybox-js','jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_quotes' );