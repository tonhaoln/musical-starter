<?php
/**
 * Image Block
 *
 * This block was generated by create-acf-block-json.
 *
 * @package WordPress
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

  $image = get_field('image');
  $image_size = get_field('image_size');

  $block_meta = ehd_get_block_meta( $block, $is_preview );

?>

<div <?php echo $block_meta; ?>>
  <div class="container">
	  <?php if( !empty( $image ) ){ ?>
      <?php echo wp_get_attachment_image($image['id'], $image_size, false, array(
        'loading' => 'lazy'
      )); ?>
    <?php } ?>
  </div>
</div>