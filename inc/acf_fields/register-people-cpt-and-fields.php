<?php
function cptui_register_my_cpts_person() {

	/**
	 * Post Type: People.
	 */

	$labels = [
		"name" => __( "People", "custom-post-type-ui" ),
		"singular_name" => __( "Person", "custom-post-type-ui" ),
		"menu_name" => __( "People", "custom-post-type-ui" ),
		"all_items" => __( "All People", "custom-post-type-ui" ),
		"add_new" => __( "Add new", "custom-post-type-ui" ),
		"add_new_item" => __( "Add new Person", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Person", "custom-post-type-ui" ),
		"new_item" => __( "New Person", "custom-post-type-ui" ),
		"view_item" => __( "View Person", "custom-post-type-ui" ),
		"view_items" => __( "View People", "custom-post-type-ui" ),
		"search_items" => __( "Search People", "custom-post-type-ui" ),
		"not_found" => __( "No People found", "custom-post-type-ui" ),
		"not_found_in_trash" => __( "No People found in trash", "custom-post-type-ui" ),
		"parent" => __( "Parent Person:", "custom-post-type-ui" ),
		"featured_image" => __( "Featured image for this Person", "custom-post-type-ui" ),
		"set_featured_image" => __( "Set featured image for this Person", "custom-post-type-ui" ),
		"remove_featured_image" => __( "Remove featured image for this Person", "custom-post-type-ui" ),
		"use_featured_image" => __( "Use as featured image for this Person", "custom-post-type-ui" ),
		"archives" => __( "Person archives", "custom-post-type-ui" ),
		"insert_into_item" => __( "Insert into Person", "custom-post-type-ui" ),
		"uploaded_to_this_item" => __( "Upload to this Person", "custom-post-type-ui" ),
		"filter_items_list" => __( "Filter People list", "custom-post-type-ui" ),
		"items_list_navigation" => __( "People list navigation", "custom-post-type-ui" ),
		"items_list" => __( "People list", "custom-post-type-ui" ),
		"attributes" => __( "People attributes", "custom-post-type-ui" ),
		"name_admin_bar" => __( "Person", "custom-post-type-ui" ),
		"item_published" => __( "Person published", "custom-post-type-ui" ),
		"item_published_privately" => __( "Person published privately.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => __( "Person reverted to draft.", "custom-post-type-ui" ),
		"item_scheduled" => __( "Person scheduled", "custom-post-type-ui" ),
		"item_updated" => __( "Person updated.", "custom-post-type-ui" ),
		"parent_item_colon" => __( "Parent Person:", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "People", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "person", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-users",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "person", $args );
}

function disable_gutenberg_for_person_post_type($use_block_editor, $post_type) {
    if ($post_type === 'person') {
        return false; // Disable Gutenberg/block editor
    }
    return $use_block_editor; // Use the default editor settings for other post types
}

add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_person_post_type', 10, 2);


// Init Person CPT
add_action( 'init', 'cptui_register_my_cpts_person' );

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_626f8666d4a96',
    'title' => 'Details',
    'fields' => array(
      array(
        'key' => 'field_626f8670b83af',
        'label' => 'Role',
        'name' => 'role',
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
        'key' => $key.'bio',
        'label' => 'Bio',
        'name' => 'bio',
        'type' => 'wysiwyg',
        'parent' => '',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
      ),
      
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'person',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'acf_after_title',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
		  0 => 'the_content',
	  ),
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

endif;		