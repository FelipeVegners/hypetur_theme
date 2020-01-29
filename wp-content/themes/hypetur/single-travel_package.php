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

	<section class="blog" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="container-fluid blog__topbar">
			<a href="../" class="back-home">Ver todos os roteiros</a>
		</div>
		<div class="container">
			<div class="row">
				<?php
					if (have_posts()) :
					while (have_posts()) : the_post();
				?>
				<div class="col-md-2 blog__post__about" itemprop="author" itemscope itemtype="https://schema.org/Person">
					<?php echo get_avatar(get_the_author_meta('ID'), 64 ); ?>
					<p class="blog__post__author">
					por <span itemprop="name"><?php the_author_posts_link(); ?></span>
					<time datetime="<?php the_time("d/m/Y"); ?>">em: <?php the_time("d/m/Y"); ?></time>
					</p>
					<!-- <p class="reading-time hidden-sm hidden-xs"><span class="minutes"></span> min. de leitura</p> -->
					<div class="blog__social__share">
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
				</div>
				<article class="col-md-8">
											<!-- post thumbnail -->
								<?php if ( has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="">
										<?php the_post_thumbnail(); ?>
									</div>
								</a>
								<?php endif; ?>
							<!-- /post thumbnail -->
					<header>
						<?php the_title('<h1 class="mb-4" itemprop="headline">','</h1>'); ?>
						<?php if (has_excerpt()) {?>
							<p class="mb-4" itemprop="description"><?php echo get_the_excerpt(); ?></p>
						<?php } ?>
						<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php echo get_permalink(); ?>"/>
						<meta itemprop="datePublished" content="<?php the_time('Y-n-j'); ?>"/>
						<meta itemprop="dateModified" content="<?php the_modified_date('Y-n-j'); ?>"/>
						<span class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
							<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
								<meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/images/brand/normal-brand.svg">
								<meta itemprop="width" content="1000">
								<meta itemprop="height" content="130">
							</span>
							<meta itemprop="name" content="HypeTur Viagens e Turismo">
						</span>
						<span class="hidden" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>">
							<meta itemprop="width" content="<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $img[1] ?>">
							<meta itemprop="height" content="<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $img[2] ?>">
						</span>
					</header>
					<div class="row">
						<main class="col-md-12 post" itemprop="articleBody">							
							<?php the_content(); ?>
							<!-- <h2 class="categories-list">Marcadores:</h2>
							<?php echo get_the_category_list(); ?> -->
						</main>
						<aside class="col-md-3 hidden-sm hidden-xs" role="complementary">
							<?php if ( is_active_sidebar( 'posts-sidebar' ) ) : ?>
								<?php dynamic_sidebar( 'posts-sidebar' ); ?>
							<?php endif; ?>
						</aside>
					</div>
					<footer class="row">
						<!-- <div class="col-md-9">
							<h2>Deixe seu comentário</h2>
							<div class="alert alert-warning" role="alert">
								<p><strong>Atenção</strong>: Os comentários abaixo são de inteira responsabilidade de seus respectivos autores e não representam, necessariamente, a opinião da Resultados Digitais.</p>
							</div>
							<?php if (comments_open()) : ?>
							<div id="disqus_thread"></div>
							<?php endif; ?>
						</div> -->
					</footer>
				</article>
				<?php
					endwhile;
					endif;
				?>											
			</div>
		</div>
	</section>
<?php get_footer(); ?>
