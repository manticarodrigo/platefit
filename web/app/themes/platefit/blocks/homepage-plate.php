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
      <div class="glide" data-component="slider">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="py-4 px-6 px-5-xl px-4-sm">
                <p class="quote-text">It is fast paced and only 27 minutes – the movements are constantly changing so you really don&apos;t have any time to get bored with this workout! These classes incorporates bands and weights. Definitely planning on taking more classes! An overall super fun workout!</p>
                <h4 class="text-uppercase quote-author">/ Aly H</h4>
              </div>
            </li>
            <li class="glide__slide">
              <div class="py-4 px-6 px-5-xl px-4-sm">
                <p class="quote-text">It is fast paced and only 27 minutes – the movements are constantly changing so you really don&apos;t have any time to get bored with this workout! These classes incorporates bands and weights. Definitely planning on taking more classes! An overall super fun workout!</p>
                <h4 class="text-uppercase quote-author">/ Aly H</h4>
              </div>
            </li>
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