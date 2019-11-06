<?php
  $args = array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'meta_key' => 'author_name',
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => '5',
  );

  $testimonials = new WP_Query( $args );

  if ($testimonials->have_posts()) :
?>

  <div class="glide" data-component="slider">
    <div class="glide__track" data-glide-el="track">

      <ul class="glide__slides">

        <?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
          <li class="glide__slide">
            <div class="py-4 px-6 px-5-xl px-4-sm">
              <p class="quote-text"><?php echo get_field('quote', get_the_ID()); ?></p>
              <h4 class="text-uppercase quote-author">/ <?php echo get_field('author_name', get_the_ID()); ?></h4>
            </div>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>

      </ul>

      <div class="glide__arrows" data-glide-el="controls">

        <button class="btn-slider btn-slider--left" data-glide-dir="&lt;" aria-label="Previous testimonial">
          <svg><use href="#arrow"></use></svg>
        </button>

        <button class="btn-slider" data-glide-dir="&gt;" aria-label="Next testimonial">
          <svg><use href="#arrow"></use></svg>
        </button>

      </div>

    </div>
  </div>

<?php endif; ?>