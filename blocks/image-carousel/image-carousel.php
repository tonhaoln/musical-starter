<?php 
  $args = wp_parse_args($args);
  $images = $args['images'];
  
?>
   <div class="f-carousel carousel">
        <?php foreach($images as $image) {  
            $caption = false;
            // Check if 'caption' exists and is not empty
            if (!empty($image['title'])) {
                $caption = $image['title'];
            } elseif (!empty($image['caption'])) { // Check if 'title' exists and is not empty
                $caption = $image['caption'];
            }
          ?>
        
          <div class="f-carousel__slide">
                <figure>
                <a href="<?php echo $image['sizes']['large']; ?>" data-fancybox="carousel-gallery" data-caption="<?php echo $caption; ?>">
                    <?php echo wp_get_attachment_image($image['id'], 'feature-thumb', false, array(
                          'loading' => 'lazy',
                          'class' => 'aligncenter',
                    )); ?>
                  </a>
                  <figcaption><?php echo $caption; ?></figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>