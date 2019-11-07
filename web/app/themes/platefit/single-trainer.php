<?php get_header(); ?>

  <main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">
    <?php
      while (have_posts()) : the_post();
      $full_name = get_field('first_name') . ' ' . get_field('last_name');
    ?>

      <article id="trainer-<?php echo get_the_ID(); ?>" class="row bg-color-light">
        <div class="col-2 col-1-md">
          <img src="<?php the_field('image'); ?>" class="width-full">
        </div>
        <div class="border-box p-4 py-5 col-2 col-1-md text-center-lg">
          <p class="mb-5 quote-text"><?php the_field('quote'); ?></p>
          <h1 class="my-0 h3 text-uppercase"><?php echo $full_name; ?></h1>
          <a class="link dark underline" target="_blank" href="<?php the_field('social_url'); ?>">
            @<?php the_field('social_handle'); ?>
          </a>
          <div class="my-4">
            <p class="paragraph"><?php the_field('hometown'); ?></p>
            <?php the_field('bio'); ?>
          </div>
          <div class="row center-lg">
            <a href="#schedule" class="mr-2 mr-0-lg mb-2 btn btn--arrow btn--full-lg">
              View Classes <svg><use href="#arrow" /></svg>
            </a>
            <a class="mb-2 btn btn--arrow btn--full-lg" target="_blank" href="mailto:info@platefit.co">
              Book a Private <svg><use href="#arrow" /></svg>
            </a>
          </div>
        </div>
      </article>


      <section id="schedule" class="p-5 p-4-md px-2-sm text-center bg-color-light">
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
      </section>

    <?php endwhile; ?>

  </main>

<?php get_footer(); ?>
