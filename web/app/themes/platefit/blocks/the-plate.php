<!-- plate bg container -->
<div class="relative bg-color-light bg-plate" data-parallax="contain">

  <!-- video / quote -->
  <section class="pl-4 pl-0-lg py-4 row">

    <div class="border-box col-2 col-1-lg px-2-sm">
      <div class="row center-lg">
        <div class="video-container" tabindex="0">
          <video class="shadow" preload="none" poster="<?php the_field('video_poster'); ?>">
            <source src="<?php the_field('video'); ?>" type="video/mp4">
            Video Not Supported
          </video>
          <div class="video-controls">
            <svg><use href="#play"></use></svg>
          </div>
        </div>
      </div>
    </div>

    <div class="border-box col-2 col-1-lg">
      <?php get_template_part('components/slider-quotes');  ?>
    </div>
  </section>

  <!-- the science -->
  <section class="px-6 px-4-lg px-2-md py-4 relative row">

    <div class="border-box p-4 p-2-sm col-2 col-1-lg">
      <div class="text-center-lg">
          <p class="h6"><?php the_field('subtitle'); ?></p>
          <p class="my-0 h3 text-uppercase"><?php the_field('title'); ?></p>
          <p class="paragraph">
            <?php the_field('description'); ?>
          </p>
          <a class="btn btn--arrow" href="<?php the_field('link'); ?>">
            Learn more
            <svg><use href="#arrow" /></svg>
          </a>
      </div>
    </div>

    <div class="border-box p-4 p-2-sm col-2 col-1-lg row center">
      <img class="max-width-full max-height-full" src="<?php the_field('image'); ?>">
    </div>

  </section>

</div>