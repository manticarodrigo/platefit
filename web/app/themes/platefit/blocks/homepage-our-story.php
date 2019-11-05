
<section class="px-4 px-2-md py-6 py-4-md bg-color-white row">

  <div class="border-box p-4 col-3 col-2-xl col-1-md text-center">
    <img class="max-width-full" src="<?php the_field('left_image'); ?>">
  </div>

  <div class="border-box p-4 col-3 col-2-xl col-1-md text-center-md">
    <p class="h6"><?php the_field('subtitle'); ?></p>
    <h3 class="my-3 text-uppercase"><?php the_field('title'); ?></h3>
    <p class="paragraph"><?php the_field('description'); ?></p>
    <a class="btn btn--arrow" href="<?php the_field('link'); ?>">
      Our Story
      <svg><use href="#arrow" /></svg>
    </a>
  </div>

  <div class="border-box p-4 col-3 hidden-xl text-center">
    <img class="max-width-full" src="<?php the_field('right_image'); ?>">
  </div>

</section>
