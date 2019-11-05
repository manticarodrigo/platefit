<section class="bg-cover banner banner--opaque" style="background-image: url(<?php the_field('background') ?>);" data-parallax="cover">
  <div class="p-6 px-4-lg row around">
    <?php if (have_rows('links')): ?>
      <?php while (have_rows('links')) : the_row(); ?>
        <a class="col-6 col-3-lg col-1-md mb-4-md row center align-center hover-translucent" href="<?php the_sub_field('url'); ?>">
          <img class="press-img" src="<?php the_sub_field('image'); ?>" />
        </a>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
