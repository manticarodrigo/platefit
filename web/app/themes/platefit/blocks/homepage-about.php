<section class="px-6 px-4-lg px-2-md py-4 pt-box-section bg-color-light">
  <h3 class="mb-0-md h2 text-center text-uppercase letter-spacing"><?php the_field('title'); ?></h3>

  <div class="row">
    <div class="border-box p-4 p-2-sm col-2 col-1-md">
      <p class="my-0-md h2 h2-sm text-center-lg"><?php the_field('shoutout'); ?></p>
    </div>

    <div class="border-box p-4 p-2-sm col-2 col-1-md">
      <div class="text-right text-center-lg">
        <p class="paragraph">
          <?php the_field('description'); ?>
        </p>
        <a class="btn btn--arrow" href="<?php the_field('link'); ?>">
          Learn more
          <svg><use href="#arrow" /></svg>
        </a>
      </div>
    </div>
  </div>

</section>
