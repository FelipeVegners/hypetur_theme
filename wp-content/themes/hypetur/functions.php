<?php
  // Get the metabox post types
  require_once('includes/metaboxes.php');
  require_once('includes/posts-config.php');

  // Get the navwalker bootstrap menu integration
  require get_template_directory() . '/bootstrap-navwalker.php';

  register_nav_menus( array(
      'menu-1' => esc_html__( 'Primary', 'theme-hypetur' ),
  ) );

  function theme_resources() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('script-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array (), 1.0, true);
    wp_enqueue_script('script-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array ('script-jquery'), 1.0, true);
    wp_enqueue_script('my-custom-script', get_template_directory_uri() .'/scripts/app.js', array('jquery'), 1.0, true);
    // wp_enqueue_script('script-owl-carousel', get_template_directory_uri() .'/scripts/owl.carousel.min.js', array('jquery'), 1.0, true);
  }
  add_action('wp_enqueue_scripts', 'theme_resources');

  // Add default field to insert the post featured image
  add_theme_support( 'post-thumbnails', apply_filters( 'pagelines_post-thumbnails', array('post') ) );

?>