<?php if (have_rows('content')): ?>
  <?php while (have_rows('content')) : the_row(); ?>

    <?php if (get_row_layout() == 'spacer'): ?>

      <section class="p-<?php the_sub_field('spacing'); ?> bg-color-<?php the_sub_field('bg_color'); ?>"></section>

    <?php elseif (get_row_layout() == 'section_intro'): ?>

      <section class="py-5 px-4 bg-color-light">
        <div class="max-width">
          <h1 class="h2 text-center text-uppercase letter-spacing dark"><?php the_sub_field('title'); ?></h1>
          <?php if (get_sub_field('description')): ?>
            <p class="text-lg text-center paragraph"><?php the_sub_field('description'); ?></p>
          <?php endif; ?>
        </div>
      </section>

    
    <?php elseif (get_row_layout() == 'full_width_text'): ?>

      <section class="p-4 px-2-md bg-color-light">
        <div class="max-width">
          <h3 class="my-2 text-uppercase letter-spacing-sm"><?php the_sub_field('title'); ?></h3>
          <?php the_sub_field('description'); ?>
        </div>
      </section>

    <?php elseif (get_row_layout() == 'title_shoutout_text'): ?>

      <section class="px-6 px-4-lg px-2-md py-4 pt-box-section bg-color-light">
        <h3 class="mb-0-md h2 text-center text-uppercase letter-spacing"><?php the_sub_field('title'); ?></h3>

        <div class="row">
          <div class="border-box p-4 p-2-sm col-2 col-1-md">
            <p class="my-0-md h2 h2-sm text-center-lg"><?php the_sub_field('shoutout'); ?></p>
          </div>

          <div class="border-box p-4 p-2-sm col-2 col-1-md">
            <div class="text-right text-center-lg">
              <p class="paragraph">
                <?php the_sub_field('description'); ?>
              </p>
              <a class="btn btn--arrow" href="<?php the_sub_field('link'); ?>">
                <?php the_sub_field('link_text'); ?>
                <svg><use href="#arrow" /></svg>
              </a>
            </div>
          </div>
        </div>

      </section>

    <?php elseif (get_row_layout() == 'left_text_right_image'): ?>

      <section class="px-6 px-4-lg px-2-md py-4 relative row bg-color-light">
          
        <div class="border-box p-4 p-2-sm col-2 col-1-lg">
          <div class="text-center-lg">
              <?php if (get_sub_field('subtitle')): ?>
                <p class="h6"><?php the_sub_field('subtitle'); ?></p>
              <?php endif; ?>
              <p class="my-0 h3 text-uppercase"><?php the_sub_field('title'); ?></p>
              <?php the_sub_field('content'); ?>
          </div>
        </div>

        <div class="border-box p-4 p-2-sm col-2 col-1-lg row center">
          <img class="max-width-full max-height-full" src="<?php the_sub_field('image'); ?>">
        </div>

      </section>

    <?php elseif (get_row_layout() == 'left_slider_right_text'): ?>

      <section class="px-6 px-4-lg px-2-md py-4 bg-color-light">
        <article class="relative row">
          
          <div class="border-box p-4 p-2-sm col-2 col-1-lg row center">
            <?php
              $peek_size = 100;
              include(locate_template( 'components/slider-images.php', false, false));
            ?>
          </div>

          <div class="border-box p-4 p-2-sm col-2 col-1-lg">
            <div class="text-center-lg">
                <?php if (get_sub_field('subtitle')): ?>
                  <p class="h6"><?php the_sub_field('subtitle'); ?></p>
                <?php endif; ?>

                <p class="my-0 h3 text-uppercase"><?php the_sub_field('title'); ?></p>

                <?php the_sub_field('content'); ?>

                <?php if (get_sub_field('button_text') && get_sub_field('button_link')): ?>
                  <a class="btn btn--arrow" href="<?php the_sub_field('button_link'); ?>">
                    <?php the_sub_field('button_text'); ?>
                    <svg><use href="#arrow" /></svg>
                  </a>
                <?php endif; ?>
            </div>
          </div>

        </article>
      </section>

    <?php elseif (get_row_layout() == 'image_link_banner'): ?>

      <section class="bg-cover banner banner--opaque" style="background-image: url(<?php the_sub_field('background') ?>);" data-parallax="cover">
        <div class="p-6 px-4-lg row around">
          <?php if (have_rows('links')): ?>
            <?php while (have_rows('links')) : the_row(); ?>
              <a class="col-6 col-3-lg col-1-md mb-4-md row center align-center hover-translucent" target="_blank" href="<?php the_sub_field('url'); ?><?php the_sub_field('file'); ?>"><img class="press-img" src="<?php the_sub_field('image'); ?>" /></a>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </section>

    <?php elseif (get_row_layout() == 'image_text_image'): ?>


      <section class="px-4 px-2-md py-6 py-4-md bg-color-white row">

        <div class="border-box p-4 col-3 col-2-xl col-1-md text-center">
          <img class="max-width-full" src="<?php the_sub_field('left_image'); ?>">
        </div>

        <div class="border-box p-4 col-3 col-2-xl col-1-md text-center-md">
          <p class="h6"><?php the_sub_field('subtitle'); ?></p>
          <h3 class="my-3 text-uppercase"><?php the_sub_field('title'); ?></h3>
          <p class="paragraph"><?php the_sub_field('description'); ?></p>
          <a class="btn btn--arrow" href="<?php the_sub_field('button_url'); ?>">
            <?php the_sub_field('button_text'); ?>
            <svg><use href="#arrow" /></svg>
          </a>
        </div>

        <div class="border-box p-4 col-3 hidden-xl text-center">
          <img class="max-width-full" src="<?php the_sub_field('right_image'); ?>">
        </div>

      </section>
    
    <?php elseif (get_row_layout() == 'left_text_right_insta'): ?>
      
      <section class="px-6 px-4-lg px-2-md px-0-sm py-6 py-4-md bg-color-light">
        <p class="p-3 h2 text-center text-uppercase"><?php the_sub_field('headline') ?></p>

        <div class="text-center-xl row">

          <div class="border-box p-4 col-2 col-1-xl">
            <p class="h6"><?php the_sub_field('subtitle') ?></p>
            <p class="my-0 h3 text-uppercase"><?php the_sub_field('title') ?></p>
            <p class="paragraph"><?php the_sub_field('description') ?></p>
            <a class="btn btn--arrow" href="<?php the_sub_field('button_url') ?>">
              <?php the_sub_field('button_text') ?>
              <svg><use href="#arrow" /></svg>
            </a>
          </div>

          <div class="border-box col-2 col-1-xl">
            <?php echo do_shortcode('[instagram-feed]') ?>
          </div>

        </div>

      </section>

    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>
