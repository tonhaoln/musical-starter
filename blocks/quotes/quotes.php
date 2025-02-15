<?php
  /**
  * Quotes Block
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

  $quotes = get_field('quotes');
  $quotes_type =  get_field('quotes_type') == 'quotes-carousel' ? 'f-carousel carousel' : 'quotes-list';

  $block_meta = ehd_get_block_meta( $block, $is_preview );

?>

<div <?php echo $block_meta; ?>>
  <div class="container">
	  <?php if($quotes) { ?>
      <div class="quote-list <?php echo $quotes_type; ?>">
        <?php foreach($quotes as $quote) { 
            $show_quotes = $quote['show_quotes'];
          ?>
          
          <div class="quote-item f-carousel__slide">
            <blockquote class="<?php if($show_quotes) { echo ' show-quotes'; } ?>">
              <?php echo $quote['quote']; ?>
              <cite><?php echo $quote['source']; ?></cite>
            </blockquote>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>