<?php

  get_header(); the_post(); ?>

  <?php 
    if ( has_post_thumbnail() ) { ?>
    <figure>
      <?php
        echo wp_get_attachment_image(get_post_thumbnail_id(), 'large', false); 

        $caption = get_post(get_post_thumbnail_id())->post_excerpt;
        if ($caption) {
          echo '<figcaption>' . $caption . '</figcaption>';
        }
      ?>
    </figure>
  <?php } ?>

   <?php the_content();
	
  get_footer();