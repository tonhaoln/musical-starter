<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_people_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249apeople',
	'title' => 'People',
	'fields' => array(
    array(
      'key' => $key.'people',
      'label' => 'Select People',
      'name' => 'people',
      'type' => 'post_object',
      'instructions' => '',
      'required' => 1,
      'post_type' => array(
        0 => 'person',
      ),
      'taxonomy' => '',
      'allow_null' => 0,
      'multiple' => 1,
      'return_format' => 'id',
      'ui' => 1,
    ),
    array(
      'key' => $key.'headshot_visibility',
      'label' => 'Headshots',
      'name' => 'headshot_visibility',
      'type' => 'button_group',
      'instructions' => 'This will show or hide headshots for entire row',
      'required' => 0,
      'choices' => array(
        'show-headshots' => 'Show',
        'hide-headshots' => 'Hide',
      ),
      'allow_null' => 0,
      'default_value' => 'show-headshots',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/people',
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



function ehd_enqueue_ehd_people() {
  wp_register_script( 
    'ehd-people-js', 
    get_template_directory_uri() . '/dist/js/people.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_people' );