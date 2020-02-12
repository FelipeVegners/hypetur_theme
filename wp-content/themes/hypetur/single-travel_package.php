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

	<section class="blog" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="container-fluid blog__topbar">
			<a href="../" class="back-home">Ver todos os roteiros</a>
		</div>
	</section>

	<section class="single-package" style="background:url(<?php echo get_post_meta(get_the_ID(), 'picture_url', true) ?>) top center/cover no-repeat; height: 400px; position:relative;">
	</section>

		<div class="container" style="background-color: #5b4e5c; position: relative; top: -80px;">
			<div class="px-4" style="background-color: #fec578; position: relative; top: -40px; float: right; width: auto; height: 100%;">
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
				<div class="col-md-10 p-4" style="color:white">
					<h1 class="mb-2" style="color:#fec578;"><?php echo get_post_meta(get_the_ID(), 'package_title', true)?></h1>
					<p style="color:white;"><?php echo get_post_meta(get_the_ID(), 'package_description', true)?></p>
				</div>
			</div>
		</div>
<?php get_footer(); ?>
