<?php 

function ehd_render_block( $block_content, $block ) {
    if ( isset( $block['attrs']['hideEhdBlock'] ) && $block['attrs']['hideEhdBlock'] === true ) {
      
        if ( is_admin() ) {
            return $block_content;
        } else {
            return '';
        }
    }

    return $block_content;
}

add_filter( 'render_block', 'ehd_render_block', 10, 2 );
