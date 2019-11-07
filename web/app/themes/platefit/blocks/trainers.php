<?php
	$args = array(
		'post_type'   => 'trainer',
		'post_status' => 'publish',
		'meta_key' => 'last_name',
		'orderby' => 'meta_value',
		'order'   => 'ASC',
	);

	$query = new WP_Query( $args );
	
	if ($query->have_posts()) :
?>

<section class="py-6 px-5 px-3-md bg-color-light row center">
	
	<?php
		while( $query->have_posts() ) : $query->the_post();
		$post_ID = get_the_ID();
		$full_name = get_field('first_name', $post_ID) . ' ' . get_field('last_name', $post_ID);
	?>
		<article class="col-4 col-3-lg col-2-md col-1-sm p-3 trainers__box">
			<a class="trainers__img" href="<?php echo get_post_permalink(); ?>" style="background-image: url(<?php the_field('image', $post_ID) ?>);"></a>
			<p class="mb-2 trainers__name letter-spacing-sm"><?php echo $full_name ?></p>
			<a class="link dark underline" target="_blank" href="<?php the_field('social_url', $post_ID) ?>">
				@<?php the_field('social_handle', $post_ID) ?>
			</a>
		</article>
	<?php endwhile; wp_reset_postdata(); ?>

</section>

<?php endif; ?>
