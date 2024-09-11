<?php

// First lets remove all the default patterns
function ehd_remove_default_block_patterns() {
    remove_theme_support('core-block-patterns');
}

  add_action('after_setup_theme', 'ehd_remove_default_block_patterns');


// Then lets add our own.

function ehd_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        register_block_pattern(
    'ayo/featured-heading-paragraph', // Unique pattern identifier, with a prefix.
    array(
        'title'       => __( 'A Block Pattern', 'ehd' ),
        'description' => _x( 'Description', 'Block pattern description', 'ehd' ),
        'content'     => '',
                'categories'  => array( 'layout', 'text' ),
            )
        );

    }
}

add_action( 'init', 'ehd_register_block_patterns' );



// Lets register some custom categories as well:
function ehd_register_block_pattern_categories() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'layout', 
            array('label' => __('Layout', 'ehd'))
        );
    }
}

add_action('init', 'ehd_register_block_pattern_categories');