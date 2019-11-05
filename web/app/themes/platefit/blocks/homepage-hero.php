<section class="px-6 px-4-lg px-2-md center bg-cover hero" style="background-image: url(<?php the_field('background'); ?>);" data-parallax="cover">
  <h2 class="my-0 h1 text-center text-uppercase letter-spacing-sm hero__title"><?php the_field('title'); ?></h2>

  <div class="row box-row">

    <div class="col-2 col-1-sm">
      <div class="p-2 p-0-sm mb-4-sm row end">
        <a href="<?php the_field('left_box_link'); ?>" class="box box--yellow">
          <p class="text-bold text-sm"><?php the_field('left_box_title'); ?></p>
          <h3 class="my-0 box__text"><?php the_field('left_box_description'); ?></h3>
          <svg><use href="#arrow" /></svg>
        </a>
      </div>
    </div>

    <div class="col-2 col-1-sm">
      <div class="p-2 p-0-sm row">
        <a href="<?php the_field('right_box_link'); ?>" class="box">
          <p class="text-bold text-sm"><?php the_field('right_box_title'); ?></p>
          <h3 class="my-0 box__text"><?php the_field('right_box_description'); ?></h3>
          <svg><use href="#arrow" /></svg>
        </a>
      </div>
    </div>

  </div>
</section>
