<?php 
  $socialAccounts = get_field('social_accounts', 'options'); 
  
  if($socialAccounts){ ?>
  <div class="social-wrapper">
    <h3>Follow Us</h3>
    <ul class="social-links">
      <?php foreach($socialAccounts as $socialAccount){ ?>
        <li><a href="<?php echo $socialAccount['channel_link']; ?>" title="<?php echo $socialAccount['channel_name']; ?>" data-title="<?php echo $socialAccount['channel_name']; ?>" class="gtm-link-social" target="_blank" rel="noopener"><?php include_svg($socialAccount['channel_name']); ?></a></li>
      <?php } // end foreach ?>
    </ul>
  </div>
<?php } // end if social-accounts ?>