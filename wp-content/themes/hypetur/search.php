<?php

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

global $wp_query;
$results = new WP_Query($args);
?>

<?php if (have_posts()): 

while ( $wp_query->have_posts() ) : $wp_query->the_post();

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/images/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>

  <body <?php body_class(); ?>

	<!-- article -->
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
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Desculpe, não há nehum conteúdo para exibir.', 'hypetur' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
