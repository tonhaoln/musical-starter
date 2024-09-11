<?php
  function ehd_register_cpts_product() {

	/**
	 * Post Type: Product.
	 */

	$labels = [
		"name" => __( "Products", "ehd-post-type" ),
		"singular_name" => __( "Product", "ehd-post-type" ),
		"menu_name" => __( "Products", "ehd-post-type" ),
		"all_items" => __( "All Products", "ehd-post-type" ),
		"add_new" => __( "Add new", "ehd-post-type" ),
		"add_new_item" => __( "Add new Product", "ehd-post-type" ),
		"edit_item" => __( "Edit Product", "ehd-post-type" ),
		"new_item" => __( "New Product", "ehd-post-type" ),
		"view_item" => __( "View Product", "ehd-post-type" ),
		"view_items" => __( "View Products", "ehd-post-type" ),
		"search_items" => __( "Search Products", "ehd-post-type" ),
		"not_found" => __( "No Products found", "ehd-post-type" ),
		"not_found_in_trash" => __( "No Products found in trash", "ehd-post-type" ),
		"parent" => __( "Parent Product:", "ehd-post-type" ),
		"featured_image" => __( "Featured image for this Product", "ehd-post-type" ),
		"set_featured_image" => __( "Set featured image for this Product", "ehd-post-type" ),
		"remove_featured_image" => __( "Remove featured image for this Product", "ehd-post-type" ),
		"use_featured_image" => __( "Use as featured image for this Product", "ehd-post-type" ),
		"archives" => __( "Product archives", "ehd-post-type" ),
		"insert_into_item" => __( "Insert into Product", "ehd-post-type" ),
		"uploaded_to_this_item" => __( "Upload to this Product", "ehd-post-type" ),
		"filter_items_list" => __( "Filter Products list", "ehd-post-type" ),
		"items_list_navigation" => __( "Products list navigation", "ehd-post-type" ),
		"items_list" => __( "Products list", "ehd-post-type" ),
		"attributes" => __( "Products attributes", "ehd-post-type" ),
		"name_admin_bar" => __( "Product", "ehd-post-type" ),
		"item_published" => __( "Product published", "ehd-post-type" ),
		"item_published_privately" => __( "Product published privately.", "ehd-post-type" ),
		"item_reverted_to_draft" => __( "Product reverted to draft.", "ehd-post-type" ),
		"item_scheduled" => __( "Product scheduled", "ehd-post-type" ),
		"item_updated" => __( "Product updated.", "ehd-post-type" ),
		"parent_item_colon" => __( "Parent Product:", "ehd-post-type" ),
	];

	$args = [
		"label" => __( "Products", "ehd-post-type" ),
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
		"rewrite" => [ "slug" => "product", "with_front" => false ],
		"query_var" => true,
		"menu_icon" => "dashicons-database",
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "product", $args );
}