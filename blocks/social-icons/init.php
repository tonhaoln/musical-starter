<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_social-icons_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249asocial-icons',
	'title' => 'Social Icons',
	'fields' => array(
    
    array(
      'key' => $key.'use_global_options',
      'label' => 'User Global Options',
      'name' => 'use_global_options',
      'type' => 'true_false',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'message' => 0,
    ),
    array(
      'key' => $key.'add_hashtag_options',
      'label' => 'Add Hashtag Options',
      'name' => 'add_hashtag_options',
      'type' => 'true_false',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'default_value' => '',
      'message' => 0,
    ),
    array(
      'key' => $key.'social_header',
      'label' => 'Social Header',
      'name' => 'social_header',
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
      'ui_on_text' => 'Yes',
			'ui_off_text' => 'No',
			'ui' => 1,
    ),
    array(
      'key' => $key.'hashtag_left',
      'label' => 'Hashtag Left',
      'name' => 'hashtag_left',
      'type' => 'link',
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'add_hashtag_options',
            'operator' => '==',
            'value' => 1,
          ),
        ),
      ),
    ),
    array(
      'key' => $key.'hashtag_right',
      'label' => 'Hashtag Right',
      'name' => 'hashtag_right',
      'type' => 'link',
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'add_hashtag_options',
            'operator' => '==',
            'value' => 1,
          ),
        ),
      ),
    ),
    
    array(
			'key' => $key.'social_accounts',
			'label' => 'Social Accounts',
			'name' => 'social_accounts',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
        array(
          array(
            'field' => $key.'use_global_options',
            'operator' => '==',
            'value' => 0,
          ),
        ),
      ),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => $key.'channel_name',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => $key.'channel_name',
					'label' => 'Channel Name',
					'name' => 'channel_name',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'facebook' => 'facebook',
						'instagram' => 'instagram',
						'youtube' => 'youtube',
            'twitter' => 'twitter',
            'x' => 'x',
            'tiktok' => 'tiktok',
					),
					'default_value' => false,
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 0,
					'return_format' => 'value',
					'placeholder' => '',
				),
				array(
					'key' => $key.'channel_link',
					'label' => 'Channel Link',
					'name' => 'channel_link',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/social-icons',
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



function ehd_enqueue_ehd_social_icons() {
  wp_register_script( 
    'ehd-social-icons-js', 
    get_template_directory_uri() . '/dist/js/social-icons.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_social_icons' );