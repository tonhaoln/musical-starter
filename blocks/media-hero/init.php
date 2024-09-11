<?php 
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

  $key = 'block_ehd_media-hero_';

	acf_add_local_field_group( array(
	'key' => $key.'group_64ef249amedia-hero',
	'title' => 'Media Hero',
	'fields' => array(
    array(
      'key' => $key.'background_type',
      'label' => 'Background Type',
      'name' => 'background_type',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'image-background' => 'Image',
        'image-carousel' => 'Carousel',
        'video-background' => 'Video'
      ),
      'allow_null' => 0,
      'default_value' => 'image-background',
      'layout' => 'horizontal',
      'return_format' => 'value',
    ),    
    array(
      'key' => $key.'bg_image',
      'label' => 'Background',
      'name' => 'bg_image',
      'type' => 'image',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'background_type',
            'operator' => '==',
            'value' => 'image-background',
          ),
        ),
        array(
          array(
            'field' => $key.'background_type',
            'operator' => '==',
            'value' => 'video-background',
          ),
        )
      ),
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
      'key' => $key.'carousel',
      'label' => 'Carousel Images',
      'name' => 'carousel',
      'type' => 'gallery',
      'parent' => '',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'background_type',
            'operator' => '==',
            'value' => 'image-carousel',
          ),
        ),
      ),
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
      'key' => $key.'video_background',
      'label' => 'Video',
      'name' => 'video_background',
      'type' => 'file',
      'parent' => '',
      'instructions' => 'Add a video file for the background, also set the image above as a poster image.',
      'required' => 0,
      'conditional_logic' => array(
        array(
          array(
            'field' => $key.'background_type',
            'operator' => '==',
            'value' => 'video-background',
          ),
        ),
      ),
      'default_value' => '',
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_size' => 0,
      'max_size' => 0,
      'mime_types' => 'mp4,webm,ogg',
    ),
    array(
      'key' => $key.'block_type',
      'label' => 'Block Type',
      'name' => 'block_type',
      'type' => 'button_group',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'choices' => array(
        'media-full-screen-content-left' => 'Full Screen Overlay (Left)',
        'media-full-screen-content-right' => 'Full Screen Overlay (Right)',
        'media-asym-left' => 'Media Half (Left)',
        'media-asym-right' => 'Media Half (Right)' 
      ),
      'allow_null' => 0,
      'default_value' => 'media-full-screen-content-left',
      'layout' => 'vertical',
      'return_format' => 'value',
    ),
    
    
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'ehd/media-hero',
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



function ehd_enqueue_ehd_media_hero() {
  wp_register_script( 
    'ehd-media-hero-js', 
    get_template_directory_uri() . '/dist/js/media-hero.js', 
    array('jquery', 'acf'), 
    '1.0', 
    true 
  );
}
add_action( 'enqueue_block_assets', 'ehd_enqueue_ehd_media_hero' );