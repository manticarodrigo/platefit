<?php
	/* Template Name: Press */

	get_header();

	$args = array(
		'post_type'   => 'press',
		'post_status' => 'publish',
		'meta_key' => 'priority',
		'orderby' => 'meta_value',
		'order'   => 'DESC',
	);

	$query = new WP_Query( $args );
	
	if ($query->have_posts()) :
?>

	<main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">

		<!-- intro -->

		<section class="py-5 px-4 bg-color-light">
			<h1 class="h2 text-center text-uppercase letter-spacing dark">Press</h1>
			<p class="text-center paragraph trainers__message">See what other people are saying about us.</p>
		</section>

		<!-- articles -->

		<section class="py-6 px-5 px-3-md bg-color-light row center">

			<?php while( $query->have_posts() ) : $query->the_post(); ?>
				<article class="border-box p-2 col-4 col-3-lg col-2-md col-1-sm">
					<a class="press__img" target="_blank" href="<?php the_field('link') ?><?php the_field('file') ?>" style="background-image: url(<?php the_field('image'); ?>);"></a>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>

		</section>


	</main>

<?php endif; get_footer(); ?>