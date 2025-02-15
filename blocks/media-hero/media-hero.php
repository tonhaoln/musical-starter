<?php
/**
* Media Hero Block
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
  $args = get_fields();
  $background_type = $args['background_type'];
  $block_type = $args['block_type'] ?? '';
  $bg_image = isset($args['bg_image']) ? $args['bg_image'] : '';
  
  $video_poster = '';
  if($bg_image) {
    $video_poster = $bg_image['sizes']['large'];
  }
  $video_mp4 = '';
  if($background_type == 'video-background') {
    $video_mp4 = get_field('video_background')['url'];
  }

  $carousel_images = isset($args['carousel']) ? $args['carousel'] : '';

  $block_meta = ehd_get_block_meta( $block, $is_preview, 'alignfull');


  $template = array(
    array('core/heading', array(
        'level' => 1,  // Specifies that the heading should be an H1
        'placeholder' => 'Add your title',
    )),
    array('core/paragraph', array(
        'placeholder' => 'Add your content here',
    )),
    array('core/buttons', array(), array(  // Adding core/buttons block
        array('core/button', array(  // Inside core/buttons, we add a core/button
            'text' => 'Lorem',  // Button label
            'url' => '#',  // Button URL
            'className' => '',  // Additional class for styling
        ))
    ))
);


?>

<div <?php echo $block_meta; ?>>
  <div class="media-hero-inner ehd-grid <?php echo $block_type; ?>">
    <div class="inner-media-content">
      <?php echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" />'; ?>
    </div>
    <?php if($background_type == 'image-background'){ ?>
      <div class="media-hero-image">
        <div class="media-hero-image-inner">
          <?php echo wp_get_attachment_image($bg_image['id'], 'large', false); ?>
        </div>
      </div>
    <?php } else if($background_type == 'video-background'){ ?>
      <div class="media-hero-image">
        <div class="media-hero-image-inner">
          <video
            id="custom-video"
            autoplay
            loop
            style="background-image: url('<?php echo esc_url($video_poster); ?>')"
            muted
            playsinline
          >
            <source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4">
          </video>
        </div>
      </div>
     <?php } else if($background_type == 'image-carousel'){ ?>
      <div class="media-hero-image">
        <div class="media-hero-image-inner">
          <div class="inner-carousel f-carousel ">
            <?php foreach($carousel_images as $image){ 
              $image_size = 'full';
              if(isset($image['sizes']['2048x2048'])) {
                $image_size = '2048x2048';
              }
            ?>
              <div class="carousel-slide f-carousel__slide">
                <?php echo wp_get_attachment_image($image['id'], $image_size, false, array(
                  'class' => 'aligncenter',
                )); ?>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div> 