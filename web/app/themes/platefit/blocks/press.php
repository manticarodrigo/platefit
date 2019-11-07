<?php
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

<section class="py-6 px-5 px-3-md bg-color-light row center">

  <?php
    while ($query->have_posts()) : $query->the_post();
    $post_ID = get_the_ID();
  ?>
    <article class="border-box p-2 col-4 col-3-lg col-2-md col-1-sm">
      <a class="press__img" target="_blank" href="<?php echo get_field('link', $post_ID) ?><?php echo get_field('file', $post_ID) ?>" style="background-image: url(<?php echo get_field('image', $post_ID); ?>);"></a>
    </article>
  <?php endwhile; wp_reset_postdata(); ?>

</section>

<?php endif; ?>
