<?php get_header(); ?>

	<main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

	</main>
<?php get_footer(); ?>