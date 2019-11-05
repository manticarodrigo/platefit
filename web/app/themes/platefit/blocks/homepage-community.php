
<section class="px-6 px-4-lg px-2-md px-0-sm py-6 py-4-md bg-color-light">
  <p class="p-3 h2 text-center text-uppercase"><?php the_field('headline') ?></p>

  <div class="text-center-xl row">

    <div class="border-box p-4 col-2 col-1-xl">
      <p class="h6"><?php the_field('subtitle') ?></p>
      <p class="my-0 h3 text-uppercase"><?php the_field('title') ?></p>
      <p class="paragraph"><?php the_field('description') ?></p>
      <a class="btn btn--arrow" href="<?php the_field('link') ?>">
        Learn more
        <svg><use href="#arrow" /></svg>
      </a>
    </div>

    <div class="border-box col-2 col-1-xl">
      <?php echo do_shortcode('[instagram-feed]') ?>
    </div>

  </div>

</section>
