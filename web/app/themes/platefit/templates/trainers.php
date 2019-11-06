<?php
	/* Template Name: Trainers */

	get_header();

	$args = array(
		'post_type'   => 'trainer',
		'post_status' => 'publish',
		'meta_key' => 'last_name',
		'orderby' => 'meta_value',
		'order'   => 'ASC',
	);

	$trainers = new WP_Query( $args );
	
	if( $trainers->have_posts() ) :
?>

	<main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">

		<!-- intro -->

		<section class="py-5 px-4 bg-color-light">
			<h1 class="h2 text-center text-uppercase letter-spacing dark">Certified Trainers</h1>
			<p class="text-center paragraph trainers__message">
				It&apos;s simple: we&apos;re dedicated to finding strength, improving health, and looking amazing. We promise you&apos;ll leave invigorated, strong, and perfectly PLATEFIT.
			</p>
		</section>

		<!-- trainers -->

		<section class="py-6 px-5 px-3-md bg-color-light row center">

			<?php
				while( $trainers->have_posts() ) : $trainers->the_post();
				$full_name = get_field('first_name') . ' ' . get_field('last_name');
			?>
				<article class="col-4 col-3-lg col-2-md col-1-sm p-3 trainers__box">
					<a class="trainers__img" href="<?php echo get_post_permalink(); ?>" style="background-image: url(<?php the_field('image') ?>);"></a>
					<p class="mb-2 trainers__name letter-spacing-sm"><?php echo $full_name ?></p>
					<a class="link dark underline" target="_blank" href="<?php the_field('social_url') ?>">
						@<?php the_field('social_handle') ?>
					</a>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>

		</section>


	</main>

<?php endif; get_footer(); ?>