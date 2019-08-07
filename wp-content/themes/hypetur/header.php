<!doctype html>
<html <?php language_attributes(); ?> class="no-js">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145258139-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145258139-1');
  </script>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

  <link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
  <link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <header id="top" class="nav__wrapper">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="./">
        <h1 class="-logo">
          <?php bloginfo('name')?>
        </h1>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content"
        aria-controls="navbar-content" aria-expanded="false"
        aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-content">
        <?php
        wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
          'container'      => false,
          'depth'          => 2,
          'menu_class'     => 'navbar-nav ml-auto',
          'walker'         => new Bootstrap_NavWalker(),
          'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
        ) );
      ?>
      </div>
    </nav>
  </header>
