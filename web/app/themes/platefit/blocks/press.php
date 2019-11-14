<?php
	$args = array(
		'post_type'   => 'press',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'meta_key' => 'priority',
		'orderby' => 'meta_value',
		'order'   => 'DESC',
	);

	$query = new WP_Query( $args );
	
	if ($query->have_posts()) :
?>

<section class="py-6 px-5 px-3-md row center bg-color-light">

  <?php
    while ($query->have_posts()) : $query->the_post();
    $post_ID = get_the_ID();
  ?>
    <article class="border-box p-2 col-4 col-3-lg col-2-md col-1-sm">
      <a class="press__img" href="<?php echo get_post_permalink() ?>" style="background-image: url(<?php echo get_field('image', $post_ID); ?>);"></a>
    </article>
  <?php endwhile; wp_reset_postdata(); ?>

</section>

<?php endif; ?>
