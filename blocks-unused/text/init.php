<?php 
// add_action( 'acf/include_fields', function() {
// 	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
// 		return;
// 	}

//   $key = 'block_acf_text_';

// 	acf_add_local_field_group( array(
// 	'key' => $key.'group_64ef249atext',
// 	'title' => 'Text',
// 	'fields' => array(
//     array(
//       'key' => $key.'content',
//       'label' => 'Content',
//       'name' => 'content',
//       'type' => 'wysiwyg',
//       'parent' => '',
//       'instructions' => '',
//       'required' => 0,
//       'conditional_logic' => 0,
//       'default_value' => 'Add your text content here...',
//       'tabs' => 'all',
//       'toolbar' => 'full',
//       'media_upload' => 1,
//     ),
    
// 	),
// 	'location' => array(
// 		array(
// 			array(
// 				'param' => 'block',
// 				'operator' => '==',
// 				'value' => 'acf/text',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// 	'active' => true,
// 	'description' => '',
// 	'show_in_rest' => 0,
//   ) );
// } );