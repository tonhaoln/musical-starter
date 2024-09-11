<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <?php // Support for Container Queries in older browsers. It is only loaded if needed. ?>
  <script>
    if (!("container" in document.documentElement.style)) {
      import("https://unpkg.com/container-query-polyfill@^1.0.2");
    }
  </script>
	<?php wp_head(); ?>

</head>

<body <?php body_class('no-js '); ?>>
	<?php wp_body_open(); ?>
	<div class="site-wrap">
	  <a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', '_ehd' ); ?></a>
    <?php get_template_part( TEMPLATE_PATH . 'site_header_horizontal' ); ?>