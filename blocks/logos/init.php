<?php
add_action('acf/include_fields', function () {
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	$key = 'block_ehd_logos_';

	acf_add_local_field_group(array(
		'key' => $key . 'group_64ef249alogos',
		'title' => 'logos',
		'fields' => array(
			array(
				'key' => $key . 'include_border',
				'label' => 'Include Border?',
				'name' => 'include_border',
				'type' => 'true_false',
				'parent' => '',
				'instructions' => 'Apply a border to all logos within this block.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
				'ui' => 1,
			),
			array(
				'key' => $key . 'logos',
				'label' => 'Logos',
				'name' => 'logos',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'block',
				'button_label' => 'Add item',
				'sub_fields' => array(
					array(
						'key' => $key . 'image',
						'label' => 'Image',
						'name' => 'image',
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
						'wrapper' => array(
							'width' => '50%',
							'class' => '',
							'id' => '',
						),
					),
					array(
						'key' => $key . 'link',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'url',
						'parent' => '',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'default_value' => '',
						'placeholder' => 'Logo Link',
						'wrapper' => array(
							'width' => '50%',
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
					'value' => 'ehd/logos',
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
	));
});