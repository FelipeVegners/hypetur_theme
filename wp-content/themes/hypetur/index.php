<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>

  <body <?php body_class(); ?>>

    <a href="../">Voltar para o site</a>
    <section class="blog-section">
      <div class="container">
        <h1 class="section-title">Blog Hype Tur</h1>
        <div class="row">
          <div class="col-md-12">
            <p>Fixie tote bag ethnic keytar. Neutra vinyl American Apparel kale chips tofu art party, cardigan raw denim quinoa. Cray
              paleo tattooed, Truffaut skateboard street art PBR jean shorts.</p>
          </div>
        </div>
        <div class="row">
          <h2><?php _e( 'Posts recentes', 'hypetur' ); ?></h2>

          <?php get_template_part('loop'); ?>

          <?php get_template_part('pagination'); ?>
        </div>
      </div>
    </section>

<?php get_footer(); ?>