<?php
/**
 * Blocks
 *
 * @package      BEStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 **/


/**
 * Load Blocks
 */
$allowedBlocks = array(
  'core/group',
  'core/paragraph',
  'core/heading',
  'core/list',
  'core/list-item',
  'core/media-text',
  'core/cover',
  'core/separator',
  'core/spacer',
  'core/html',
  'core/button',
  'core/buttons',
  'gravityforms/form'
); // Declare it globally or outside the function if needed



function load_blocks() {
	global $allowedBlocks; // Access the global variable
	$blocks = get_blocks();
	foreach( $blocks as $block ) {


		$json_path = get_template_directory() . '/blocks/' . $block . '/block.json';
		if ( file_exists( $json_path ) ) {
			$json_data = file_get_contents( $json_path );
			$json_arr = json_decode( $json_data, true );
			$block_name = $json_arr['name'] ?? null;
			if ( $block_name ) {
				$allowedBlocks[] = $block_name;
			}
			register_block_type( get_template_directory() .  '/blocks/'.$block);
		}
	}
}
add_action( 'init', 'load_blocks', 15 );
	


add_filter( 'allowed_block_types_all', 'blockhead_allowed_block_types', 25, 2 );
 

function blockhead_allowed_block_types( $allowed_blocks, $editor_context ) {

  global $allowedBlocks; // Access the global variable
	return $allowedBlocks;
}


function blockhead_register_fields() {
  $blocks = get_blocks();
  foreach( $blocks as $block ) {
    if ( file_exists( get_template_directory() . '/blocks/' . $block . '/init.php' ) ) {
      include_once get_template_directory() . '/blocks/' . $block . '/init.php';
    }
  }

}

blockhead_register_fields();


/**
 * Get Blocks
 */
function get_blocks() {
	$blocks = scandir( get_template_directory() . '/blocks/' );
	$blocks = array_values( array_diff( $blocks, array( '..', '.', '.DS_Store', '_base-block' ) ) );
	return $blocks;
}