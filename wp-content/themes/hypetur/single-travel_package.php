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
	</head>

	<body <?php body_class(); ?>>

	<section class="single-package__topbar" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="container-fluid blog__topbar">
			<a href="../" class="back-home">Ver todos os pacotes</a>
		</div>
	</section>

	<section class="single-package__package-image" style="background:url(<?php echo get_post_meta(get_the_ID(), 'picture_url', true) ?>) center center/cover no-repeat;">
    <div class="container-fluid single-package__header">
      <div class="container">
        <div class="single-package__social-share">
          <small>Compartilhe:</small>
          <?php function getBitly($url) { $bitly = file_get_contents("http://api.bit.ly/v3/shorten?login=marketingrd&apiKey=R_7d8776cf13bd45b0bf4fa9376b1212c4&longUrl=$url%2F&format=txt"); return $bitly; } ?>
          <ul class="blog__social__list">
            <li class="facebook">
              <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
              <i class="fab fa-facebook"></i>
              </a>
            </li>
            <li class="twitter">
              <a href="https://twitter.com/intent/tweet?url=<?php $bitly = getBitly(get_permalink($post->ID)); echo $bitly ?>&text=<?php echo single_post_title(); ?>&via=resdigitais" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="google">
              <a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" target="_blank">
                <i class="fab fa-google-plus"></i>							
              </a>
            </li>
            <li class="linkedin hidden-md">
              <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo single_post_title(); ?>&source=<?php bloginfo('url'); ?>" target="_blank">
                <i class="fab fa-linkedin"></i>							
              </a>
            </li>
            <li class="whatsapp hidden-sm hidden-md hidden-lg">
              <a href="whatsapp://send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" target="_blank">
                <i class="fab fa-whatsapp"></i>								
              </a></li>

          </ul>
        </div>
        <div class="row">
          <div class="col-10">
            <h1 class="single-package__title"><?php echo get_post_meta(get_the_ID(), 'package_title', true)?></h1>
            <div class="single-package__intro-text"><?php echo get_post_meta(get_the_ID(), 'intro', true)?></div>
          </div>
        </div>
      </div>
    </div>
  </section>

		<section class="single-package__wrapper">
      <div class="container">
        <div class="row">
          <p><?php echo get_post_meta(get_the_ID(), 'package_description', true) ?></p>
        </div>
        <div class="row destination-price">
          <div class="col-md-6">
            <div class="row package-includes">
              <?php 
                $includes = get_post_meta(get_the_ID(), 'package_includes', false);
                foreach ( $includes as $include ) {
              ?>
              <div class="col-md-3 package-icon">
                <span class="icon-wrapper" data-icon="<?php echo $value; ?>">
                  <img class="icon -<?php echo $include; ?>" src="<?php echo get_template_directory_uri();?>/images/icons/<?php echo $include; ?>.svg"> -->
                </span>
                <p class="icon-label"><?php echo $include; ?></p>
              </div>
              <?php
                }
              ?>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p><?php echo get_post_meta(get_the_ID(), 'package_include_description', true) ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-5 inset-md-1 package-price">
            <div class="row">
              <div class="col-md-12 text-center text-md-left">
                <h2 class="mb-3">Valor do Pacote:</h2>
                <small>a partir de:</small>
                <h3 class="mb-0">Entrada:</h3>
                <h2 class="mb-3">R$ <?php echo get_post_meta(get_the_ID(), 'package_initial_ammount', true) ?></h2>
                <h3 class="mb-0">Saldo em:</h3>
                <h2>
                  <?php echo get_post_meta(get_the_ID(), 'package_payment_parcels', true) ?>
                  x de: R$ <?php echo get_post_meta(get_the_ID(), 'package_parcel_ammount', true) ?>
                </h2>
                <small><?php echo get_post_meta(get_the_ID(), 'package_price_disclaimer', true) ?></small>
                <a href="https://api.whatsapp.com/send?l=pt_br&phone=5511953845396&text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20o%20pacote:%20<?php echo $package_meta['package_title'][0] ?>" target="blank" class="buy-package">Fazer reserva</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row single-package__inclusions">
          <div class="col-md-12">
            <div class="package-more-info">
              <ul class="nav nav-tabs" id="package-more-details" role="tablist">
                <li class="nav-item">
                  <a class="more-info-tab active" id="includes" data-toggle="tab" href="#includes-<?php echo get_post_meta(get_the_ID(), 'country', true) ?>" role="tab" aria-controls="home" aria-selected="true">Inclusões</a>
                </li>
                <li class="nav-item">
                  <a class="more-info-tab" id="schedule" data-toggle="tab" href="#schedule-<?php echo get_post_meta(get_the_ID(), 'country', true) ?>" role="tab" aria-controls="profile" aria-selected="false">Roteiro Diário</a>
                </li>
              </ul>
              <div class="tab-content more-info-content">
                <div class="tab-pane fade show active" id="includes-<?php echo get_post_meta(get_the_ID(), 'country', true) ?>" role="tabpanel" aria-labelledby="includes">
                  <?php echo get_post_meta(get_the_ID(), 'package_tab_inclusions', true) ?>
                </div>
                <div class="tab-pane fade" id="schedule-<?php echo get_post_meta(get_the_ID(), 'country', true) ?>" role="tabpanel" aria-labelledby="schedule">
                  <?php echo get_post_meta(get_the_ID(), 'package_tab_schedule', true) ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
		</section>
<?php get_footer(); ?>
