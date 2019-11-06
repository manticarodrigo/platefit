<?php
	/* Template Name: Locations */

	get_header();

	$args = array(
    'post_type' => 'location',
    'post_status' => 'publish',
    'meta_key' => 'title',
    'orderby' => 'publish_date',
    'order' => 'ASC',
  );

  $locations = new WP_Query( $args );

  if ($locations->have_posts()) :
?>

	<main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">

		
		<!-- intro and links -->
		<section class="py-5 px-4 bg-color-light">
			<h1 class="h2 text-center text-uppercase letter-spacing dark">Platefit Locations</h2>
			<ul class="pl-0 list-unstyled row locations-menu">
				<?php while($locations->have_posts()) : $locations->the_post(); ?>
					<li>
						<a class="text-uppercase" href="#location-<?php echo get_the_ID(); ?>">
							<?php the_field('title'); ?>
						</a>
					</li>
        <?php endwhile; ?>
			</ul>
		</section>

		<!-- locations -->
		<section class="pb-5 location-section bg-color-light bg-plate" data-parallax="contain">

			<?php
				while($locations->have_posts()) : $locations->the_post();
					get_template_part('components/location');
				endwhile;
			?>
		</section>

	</main>

<?php endif; get_footer(); ?>