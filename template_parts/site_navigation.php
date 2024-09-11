<a id="navToggle" class="nav-toggle" aria-hidden="true">
  Menu
</a>
<div class="nav-box">
  <nav id="site-navigation" class="main-navigation nav-collapse" role="navigation">
    <a id="closeNav">CLOSE</a>
    <?php
      wp_nav_menu( array(
        'theme_location' => 'main-menu',
        'menu_id'        => 'primary-menu',
      ) );
    ?>
  </nav><!-- #site-navigation -->
</div>