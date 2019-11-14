<?php get_header(); ?>

  <main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">
    <?php while (have_posts()) : the_post(); ?>

      <section id="press-<?php echo get_the_ID(); ?>" class="p-5 p-4-md px-2-sm row bg-color-light">

        <div class="border-box p-4 py-5 col-2 col-1-md text-center-lg">
          <h1 class="my-0 text-uppercase"><?php echo get_the_title(); ?></h1>
          <p class="my-4"><?php the_field('description'); ?></p>
          <img src="<?php the_field('image'); ?>" class="width-full" style="max-width: 350px">
        </div>

        <div class="border-box p-4 py-5 col-2 col-1-md text-center-lg">

          <?php if (have_rows('videos')): ?>
            <div class="bg-color-light">
              <h2 class="h5 text-uppercase">Video(s)</h2>
              <div class="row wrap">
                <?php while (have_rows('videos')) : the_row(); ?>
                  <article class="mr-3 mb-3 col-2 col-1-md video-container" tabindex="0">
                    <video controls class="shadow" preload="auto">
                      <source src="<?php the_sub_field('file'); ?>" type="video/mp4">
                      Video Not Supported
                    </video>
                    <div class="video-controls">
                      <svg><use href="#play"></use></svg>
                    </div>
                  </article>
                <?php endwhile; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if (have_rows('links')): ?>
            <div class="bg-color-light">
              <h2 class="h5 text-uppercase">Link(s)</h2>
              <ul class="pl-0 list-unstyled row wrap">
                <?php while (have_rows('links')) : the_row(); ?>
                  <li class="border-box pr-3 pb-3 col-2 col-1-md">
                    <p>
                      <a class="link dark underline" target="_blank" href="<?php the_sub_field('url'); ?>">
                        <?php the_sub_field('title'); ?>
                      </a>
                    </p>
                    <a class="mt-3 btn btn--arrow" target="_blank" href="<?php the_sub_field('url'); ?>">
                      Open Link
                      <svg><use href="#arrow" /></svg>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
          <?php endif; ?>

          <?php if (have_rows('pdfs')): ?>
            <div class="bg-color-light">
              <h2 class="h5 text-uppercase">Articles(s)</h2>
              <ul class="pl-0 list-unstyled row wrap">
                <?php while (have_rows('pdfs')) : the_row(); ?>
                  <li class="border-box pr-3 pb-3 col-2 col-1-md">
                    <p>
                      <a class="link dark underline" target="_blank" href="<?php the_sub_field('file'); ?>">
                        <?php the_sub_field('title'); ?>
                      </a>
                    </p>
                    <a class="mt-3 btn btn--arrow" target="_blank" href="<?php the_sub_field('file'); ?>">
                      Open Article
                      <svg><use href="#arrow" /></svg>
                    </a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
          <?php endif; ?>

        </div>
      </section>


      <!-- <section id="schedule" class="p-5 p-4-md px-2-sm text-center bg-color-light">
        <article class="max-width">
          <h2 class="text-uppercase">
            <?php if (get_field('schedule')): ?>
              Schedule
            <?php else: ?>
              Schedule - Coming soon
            <?php endif; ?>
          </h2>
          <?php the_field('schedule'); ?>
        </article>
      </section> -->

    <?php endwhile; ?>

  </main>

<?php get_footer(); ?>
