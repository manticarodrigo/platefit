<?php
	$args = array(
    'post_type' => 'location',
		'post_status' => 'publish',
		'posts_per_page' => -1,
    'meta_key' => 'title',
    'orderby' => 'publish_date',
    'order' => 'ASC',
  );

  $query = new WP_Query( $args );

  if ($query->have_posts()) :
?>
		
		<!-- intro and links -->
		<section class="py-5 px-4 bg-color-light">
			<h1 class="h2 text-center text-uppercase letter-spacing dark"><?php the_field('title'); ?></h2>
			<ul class="pl-0 list-unstyled row locations-menu">
				<?php while($query->have_posts()) : $query->the_post(); ?>
					<li>
						<a class="text-uppercase" href="#location-<?php echo get_the_ID(); ?>">
							<?php the_field('title', get_the_ID()); ?>
						</a>
					</li>
        <?php endwhile; ?>
			</ul>
		</section>

		<!-- locations -->
		<section class="pb-5 location-section bg-color-light bg-plate" data-parallax="contain">

			<?php
				while($query->have_posts()) : $query->the_post();
          get_template_part('components/location');
				endwhile;
			?>
		</section>

<?php endif; ?>