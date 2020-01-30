<?php
	$args = array(
		'post_type'   => 'workout',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);

	$query = new WP_Query( $args );
	
	if ($query->have_posts()) :
?>

<section class="py-6 px-5 px-3-md bg-color-light row center">
	
	<?php
		while( $query->have_posts() ) : $query->the_post();
		$post_ID = get_the_ID();
	?>
		<article class="border-box col-4 col-3-lg col-2-md col-1-sm p-3">
      <img class="max-width-full" src="<?php the_field('image', $post_ID) ?>" alt="<?php the_title(); ?> workout image." />
			<h2 class="h5 mb-2 text-uppercase"><?php the_title(); ?></h2>
      <p class="paragraph" data-modifier="truncate"><?php the_field('description', $post_ID); ?></p>
      <button class="px-0 link dark underline" data-modifier="truncate-toggle">Read more</button>
		</article>
	<?php endwhile; wp_reset_postdata(); ?>

</section>

<?php endif; ?>
