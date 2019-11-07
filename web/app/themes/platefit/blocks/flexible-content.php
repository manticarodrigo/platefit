<?php if (have_rows('content')): ?>
  <?php while (have_rows('content')) : the_row(); ?>

    <?php if (get_row_layout() == 'section_intro'): ?>

      <section class="py-5 px-4 bg-color-light">
        <div class="max-width">
          <h1 class="h2 text-center text-uppercase letter-spacing dark"><?php the_sub_field('title'); ?></h1>
          <?php if (get_sub_field('description')): ?>
            <p class="text-lg text-center paragraph"><?php the_sub_field('description'); ?></strong></p>
          <?php endif; ?>
        </div>
      </section>
    
    
    <?php elseif (get_row_layout() == 'testimonials'): ?>

      <section class="p-6 px-4-lg px-2-md bg-color-light row center">
        <?php
          $peek_size = 350;
          include(locate_template( 'components/slider-quotes.php', false, false));
        ?>
      </section>
    
    
    <?php elseif (get_row_layout() == 'image_slider'): ?>

        <section class="bg-color-light row center">
          <?php
            $peek_size = 250;
            include(locate_template('components/slider-images.php', false, false));
          ?>
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

    <?php endif; ?>

  <?php endwhile; ?>
<?php endif; ?>
