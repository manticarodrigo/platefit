<?php
  $args = array(
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => '5',
  );

  $query = new WP_Query( $args );

  $peek_size = isset($peek_size) ? $peek_size : 0;
  $padding = $peek_size > 100 ? 'py-4 px-5 px-4-xl px-3-lg' : 'py-4 px-6 px-5-xl px-4-lg px-3-md';

  if ($query->have_posts()) :
?>

  <div class="glide" data-component="slider" data-peek-size="<?php echo $peek_size ?>">
    <div class="glide__track glide__track--faded" data-glide-el="track">
      <ul class="glide__slides">

        <?php
          while($query->have_posts()) : $query->the_post();
          $text = get_field('quote', get_the_ID());
          $maxPos = 400;
          if (strlen($text) > $maxPos)
          {
              $lastPos = ($maxPos - 3) - strlen($text);
              $text = substr($text, 0, strrpos($text, ' ', $lastPos)) . '...';
          }
        ?>
          <li class="glide__slide">
            <div class="<?php echo $padding ?>">
              <p class="quote-text"><?php echo $text; ?></p>
              <h4 class="text-uppercase underline quote-author">/ <?php echo get_field('author_name', get_the_ID()); ?></h4>
            </div>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>

      </ul>
    </div>

    <div class="glide__arrows" data-glide-el="controls">
      <button class="btn-slider btn-slider--left" data-glide-dir="&lt;" aria-label="Previous testimonial">
        <svg><use href="#arrow"></use></svg>
      </button>

      <button class="btn-slider" data-glide-dir="&gt;" aria-label="Next testimonial">
        <svg><use href="#arrow"></use></svg>
      </button>
    </div>
  </div>

<?php endif; ?>