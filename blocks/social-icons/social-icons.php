<?php
  /**
  * Social Icons Block
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

  $social_header = get_field('social_header');
  
  $block_meta = ehd_get_block_meta( $block, $is_preview );

  $use_global_options = get_field('use_global_options');
  if($use_global_options){
    $socialAccounts = get_field('social_accounts', 'options');
  } else {
    $socialAccounts = get_field('social_accounts');
  }

  $add_hashtag_options = get_field('add_hashtag_options');
  if($add_hashtag_options){
    $hashtag_left = get_field('hashtag_left');
    $hashtag_right = get_field('hashtag_right');
  } else {
    $hashtag_left = false;
    $hashtag_right = false;
  }
  
?>

<div <?php echo $block_meta; ?>>
  <div class="container">
	  <?php 
  
  
  if($socialAccounts){ ?>
  <div class="social-wrapper">
    <?php if($social_header){ ?>
      <h3 class="wp-block-heading has-text-align-center has-brown-color has-text-color "><?php echo $social_header; ?></h3>
    <?php } ?>
    <div class="social-row">
      <?php if($hashtag_left){ ?>
        <div class="hastag-left hashtag-link">
          <a href="<?php echo $hashtag_left['url']; ?>" target="<?php echo $hashtag_left['target']; ?>"><?php echo $hashtag_left['title']; ?></a>
        </div>
      <?php } ?>
        <ul class="social-links">
          <?php foreach($socialAccounts as $socialAccount){ ?>
            <li><a href="<?php echo $socialAccount['channel_link']; ?>" title="<?php echo $socialAccount['channel_name']; ?>" data-title="<?php echo $socialAccount['channel_name']; ?>" class="gtm-link-social" target="_blank" rel="noopener"><?php include_svg($socialAccount['channel_name']); ?></a></li>
          <?php } // end foreach ?>
        </ul>
        <?php if($hashtag_right){ ?>
        <div class="hastag-right hashtag-link">
          <a href="<?php echo $hashtag_right['url']; ?>" target="<?php echo $hashtag_right['target']; ?>"><?php echo $hashtag_right['title']; ?></a>
        </div>
      <?php } ?>
      </div>
    </div>
  <?php } // end if social-accounts ?>
  </div>
</div>