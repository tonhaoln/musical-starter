<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_video-text_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249avideo-text',
	'title' => 'Video Text',
	'fields' => array(
    array(
      'key' => $key.'video_url',
      'label' => 'Video URL',
      'name' => 'video_url',
      'type' => 'url',
      'parent' => '',
      'instructions' => 'Add the YouTube of Vimeo URL',
      'required' => 1,
      'conditional_logic' => 0,
      'default_value' => '',
      'placeholder' => '',
    ),
    array(
      'key' => $key.'video_image',
      'label' => 'Video Image',
      'name' => 'video_image',
      'type' => 'image',
      'parent' => '',
      'instructions' => 'Add an optional image to replace the default',
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
    ),
    array(
      'key' => $key.'video_side',
      'label' => 'Video Side',
      'name' => 'video_side',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'video-left' => 'Left',
        'video-right' => 'right',
      ),
      'allow_null' => 0,
      'default_value' => 'video-right',
      'layout' => 'horizontal',
      'return_format' => 'value',
    )
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/video-text',
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