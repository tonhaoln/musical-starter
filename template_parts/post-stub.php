<article class="post-stub">
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <small class="date"><?php the_time('F jS, Y') ?></small>

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

  <?php the_excerpt(); ?>
</article>