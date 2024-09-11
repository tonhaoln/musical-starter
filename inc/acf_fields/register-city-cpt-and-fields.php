<?php 
function cptui_register_my_cpts_city() {

	/**
	 * Post Type: Cities.
	 */

	$labels = [
		"name" => __( "Cities", "custom-post-type-ui" ),
		"singular_name" => __( "City", "custom-post-type-ui" ),
		"menu_name" => __( "Cities", "custom-post-type-ui" ),
		"all_items" => __( "All Cities", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new City", "custom-post-type-ui" ),
		"edit_item" => __( "Edit City", "custom-post-type-ui" ),
		"new_item" => __( "New City", "custom-post-type-ui" ),
		"view_item" => __( "View City", "custom-post-type-ui" ),
		"view_items" => __( "View Cities", "custom-post-type-ui" ),
		"search_items" => __( "Search Cities", "custom-post-type-ui" ),
		"not_found" => __( "No Cities found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No Cities found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent City:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this City", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this City", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this City", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this City", "custom-post-type-ui" ),
		"archives" => __( "City archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into City", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this City", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter Cities list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "Cities list navigation", "custom-post-type-ui" ),
		"items_list" => __( "Cities list", "custom-post-type-ui" ),
		"attributes" => __( "Cities attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "City", "custom-post-type-ui" ),
		"item_published" => __( "City published", "custom-post-type-ui" ),
		"item_published_privately" => __( "City published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "City reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "City scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "City updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent City:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Cities", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "tickets", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-tickets-alt",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "city", $args );
}

 add_action( 'init', 'cptui_register_my_cpts_city' );


 // custom fields:
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_61638eedb0e21',
	'title' => 'City Information',
	'fields' => array(
		array(
			'key' => 'field_6212f2457bece',
			'label' => 'Status',
			'name' => 'status',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'waitlist' => 'Waitlist',
				'onsale' => 'Onsale',
				'open' => 'Open',
			),
			'default_value' => array(
				0 => 'waitlist',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
    array(
			'key' => 'field_61638efdsdfu8bs0',
			'label' => 'Homepage Message',
			'name' => 'homepage_message',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
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
		array(
			'key' => 'field_61638efd37510',
			'label' => 'Dates',
			'name' => 'dates',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
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
		array(
			'key' => 'field_61638ef43750f',
			'label' => 'Theatre',
			'name' => 'theatre',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
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
		array(
			'key' => 'field_6212f8b006ad3',
			'label' => 'Theatre Address',
			'name' => 'theatre_address',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
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
		array(
			'key' => 'field_6212f8b906ad4',
			'label' => 'Map Link',
			'name' => 'map_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
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
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'city',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'modified' => 1645410497,
));

endif;