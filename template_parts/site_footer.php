</div> <!-- end content-wrap -->
<footer class="site-footer">
  <?php if ( is_active_sidebar( 'ehd_footer' ) ) : ?>
    <div id="ehd-footer" class="ehd-footer">
        <?php dynamic_sidebar( 'ehd_footer' ); ?>
    </div>
<?php endif; ?>


  <?php get_template_part( TEMPLATE_PATH . 'social-links' ); ?>

    <?php 
    if(INCLUDE_FOOTER_SPONSORS){

    $sponsors = get_field('sponsors','options');
    $producers = get_field('producers','options');
    if ($sponsors || $producers) { ?>
      <div class="sponsors-producers-row">
        <?php if($sponsors){ ?>
          <div class="sponsors-row">
            <?php foreach($sponsors as $sponsor) { ?>
              <a href="<?php echo $sponsor['link']; ?>" target="_blank" title="<?php echo $sponsor['image']['alt']; ?>">
                <img src="<?php echo $sponsor['image']['sizes']['medium']; ?>" alt="<?php echo $sponsor['image']['alt']; ?>" width="<?php echo $sponsor['image']['width']; ?>" height="<?php echo $sponsor['image']['height']; ?>">
              </a>
            <?php } // end foreach ?>
          </div>
        <?php } ?>
        <?php if($producers){ ?>
          <div class="producers-row">
            <?php foreach($producers as $producer) { ?>
              <a href="<?php echo $producer['link']; ?>" target="_blank" title="<?php echo $producer['image']['alt']; ?>">
                <img src="<?php echo $producer['image']['sizes']['medium']; ?>" alt="<?php echo $producer['image']['alt']; ?>" width="<?php echo $producer['image']['width']; ?>" height="<?php echo $producer['image']['height']; ?>">
              </a>
            <?php } // end foreach ?>
          </div>
        <?php } ?>
      </div>
    <?php } // end if sponsors
    
    }
  ?>
      
  <div class="container">
    <div class="left">
      <p>&copy; <?php echo date("Y");?> <?php bloginfo('name'); ?>.</p>
    </div>
    <div class="right">
      <p><a href="/contact">Contact</a> | <a href="/privacy">Privacy</a> | Site by <a href="https://emptyhead.com.au">Emptyhead</a></p>
    </div>
  </div>
</footer>