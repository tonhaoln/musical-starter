<?php if(is_front_page()){
    $logo_element = 'h1';
  } else {
    $logo_element = 'p';
  } 
?>

<header id="masthead" class="site-header">
  <div class="navigation-box">
    <<?php echo $logo_element; ?> class="logo">
        <a tabindex="2" accesskey="1" href="/">
          <img src="<?php bloginfo('template_url'); ?>/dist/images/logo-12.svg" width="270" height="56" alt="<?php bloginfo('name'); ?>">
        </a> 
        <span class="hidden"><?php bloginfo('name'); ?></span>
      </<?php echo $logo_element; ?>>
      <?php 
         get_template_part( TEMPLATE_PATH . 'site_navigation' ); 
      ?>
  </div>
  <?php // get_template_part( TEMPLATE_PATH . 'page_header' ); ?>
</header>
<div class="content-wrap">