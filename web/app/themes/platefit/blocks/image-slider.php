<?php if (have_rows('images')): ?>
  <section class="bg-color-light row center">
    <div class="glide" data-component="slider" data-peek-size="250">
      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
          <?php while (have_rows('images')) : the_row(); ?>
            <li class="glide__slide"><img src="<?php the_sub_field('image'); ?>"></li>
          <?php endwhile; ?>
        </ul>
        <div class="glide__arrows" data-glide-el="controls">
          <button class="btn-slider btn-slider--left" data-glide-dir="&lt;">
            <svg><use href="#arrow"></use></svg>
          </button>
          <button class="btn-slider" data-glide-dir="&gt;">
            <svg><use href="#arrow"></use></svg>
          </button>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>