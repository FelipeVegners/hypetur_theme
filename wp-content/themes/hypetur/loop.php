<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" class="blog__list">
	<!-- <?php post_class(); ?> -->

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
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h2>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Publicado por', 'hypetur' ); ?> <?php the_author_posts_link(); ?></span>
			<!-- <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span> -->
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
		<h2><?php _e( 'Sorry, nothing to display.', 'hypetur' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
