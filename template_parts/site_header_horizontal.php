<?php if(is_front_page()){
    $logo_element = 'h1';
  } else {
    $logo_element = 'p';
  } 
?>

<header id="masthead" class="site-header">
  <div class="menu-bar">
    <<?php echo $logo_element; ?> class="logo">
        <a href="/">
          <img src="<?php bloginfo('template_url'); ?>/dist/images/logo-12.svg" width="270" height="56" alt="<?php bloginfo('name'); ?>">
        </a> 
        <span class="hidden"><?php bloginfo('name'); ?></span>
      </<?php echo $logo_element; ?>>
      <div class="menu-right">
        
        <a id="navToggle" class="nav-toggle" aria-hidden="true">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
  </div>
  <div class="nav-box">
    <div class="nav-inner">
      <nav id="site-navigation" class="main-navigation nav-collapse" role="navigation">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'menu_id'        => 'primary-menu',
          ) );
        ?>
      </nav><!-- #site-navigation -->
    </div>
  </div>
  <?php // get_template_part( TEMPLATE_PATH . 'page_header' ); ?>
</header>
<div id="primary" class="content-wrap">