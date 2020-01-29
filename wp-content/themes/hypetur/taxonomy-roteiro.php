	<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title('Blog | termo buscado:'); ?> - <?php bloginfo('name'); ?></title>

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
	
	<section class="blog">
		<div class="container-fluid blog__topbar">
			<a href="../" class="back-home">Voltar</a>
		</div>
		<div class="container">
      <div class="row">
        <div class="col-md-9 offset-md-1">
					<h1>Pacotes para <?php single_cat_title( '', true ); ?></h1>
					<p class="posts-count">
						Nós temos 
						<?php if ( $wp_query->found_posts == 1){ echo $wp_query->found_posts ?> roteiro disponível,
						<?php } else { echo $wp_query->found_posts ?> roteiros disponíveis, <?php } ?>
						confira:
					</p>
					<?php echo category_description(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-9 offset-md-1">
					<?php
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
					?>
						<article id="post-<?php the_ID(); ?>" class="blog__list">

							<!-- post thumbnail -->
							<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="blog__list__image">
									<?php the_post_thumbnail(); ?>
								</div>
							</a>
							<?php endif; ?>
							<!-- /post thumbnail -->

							<div class="blog__list__details">
								<!-- post title -->
								<h2>
									<a class="blog__post__title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								</h2>
								<!-- /post title -->

								<!-- post details -->
								<span class="blog__post__author">por <?php the_author_posts_link(); ?> - em <?php the_time("d/m/Y"); ?></span>
								<!-- /post details -->

								<?php hypeturwp_excerpt('hypeturwp_index'); // Build your custom callback length in functions.php ?>
								<!-- <?php the_content();?> -->

								<?php edit_post_link(); ?>		
							</div>

						</article>
					<?php
						endwhile;
						endif;
					?>
				</div>		
			</div>
		</div>
	</section>

	<?php get_footer(); ?>