<?php
  $key = 'site_options_';

  define('INCLUDE_FOOTER_SPONSORS', false);

  if(INCLUDE_FOOTER_SPONSORS){
    
    $sponsors = array(
      'key' => $key.'sponsors',
      'label' => 'Sponsors',
      'name' => 'sponsors',
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
          'key' => $key.'image',
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
          'wrapper' => array (
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
        ),
        array(
          'key' => $key.'link',
          'label' => 'link',
          'name' => 'link',
          'type' => 'url',
          'parent' => '',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'placeholder' => 'Sponsor Link',
          'wrapper' => array (
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
        )
      ),
    );

    $producers = array(
      'key' => $key.'producers',
      'label' => 'Producers',
      'name' => 'producers',
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
          'key' => $key.'image',
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
          'wrapper' => array (
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
        ),
        array(
          'key' => $key.'link',
          'label' => 'link',
          'name' => 'link',
          'type' => 'url',
          'parent' => '',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'default_value' => '',
          'placeholder' => 'Sponsor Link',
          'wrapper' => array (
            'width' => '50%',
            'class' => '',
            'id' => '',
          ),
        )
      ),
    );
  } else {
    $sponsors = array();
    $producers = array();
  }

acf_add_local_field_group(array(
	'key' => 'options_content_group_5e90',
	'title' => 'Options',
	'fields' => array(
    array(
			'key' => 'field_5a974834ce961',
			'label' => 'Social Accounts',
			'name' => 'social_accounts',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_5a97489dce962',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_5a97489dce962',
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
					'key' => 'field_5a97491cce963',
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
		$sponsors,
    $producers
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => true,
	'description' => '',
));