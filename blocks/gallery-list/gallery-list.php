<?php
/**
* Gallery List Block
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

  $block_meta = ehd_get_block_meta( $block, $is_preview );
  $galleries = get_field( 'galleries' );

?>

<div <?php echo $block_meta; ?>>
  <?php if ( $galleries ) { ?>
    <div class="gallery-grid">
      <?php foreach ( $galleries as $gallery ) { 
          $gallery_images = $gallery['gallery'];
          $gallery_key_image = $gallery_images[0];
          $galleryLink = text_to_anchor( $gallery['title'] );
        ?>
        <div class="gallery-item">
          <a href="<?php echo $gallery_key_image['sizes']['large']; ?>" data-fancybox="<?php echo $galleryLink; ?>" data-caption="<?php echo $gallery_key_image['title']; ?>">
            <div class="gallery-item__image">
              <?php echo wp_get_attachment_image($gallery_key_image['id'], 'feature-square', false ); ?>
            </div>
            <div class="gallery-item__title">
              <h2><?php echo esc_html( $gallery['title'] ); ?></h2>
              <h4><?php echo esc_html( $gallery['subtitle'] ); ?></h4>
            </div>
          </a>
          <?php foreach($gallery_images as $i => $gallery_image){ if( $i < 1 ) { continue; }?>
            <a href="<?php echo $gallery_image['sizes']['large']; ?>" data-fancybox="<?php echo $galleryLink; ?>" data-caption="<?php echo $gallery_image['title']; ?>" style="display: none;"></a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>