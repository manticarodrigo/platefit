<?php get_header(); ?>

  <main class="px-4 px-3-md px-2-sm overflow-hidden relative container" role="main" aria-label="Main content">
    <?php while ( have_posts() ) : the_post(); ?>
      <section class="bg-color-light">
        <?php get_template_part('components/location'); ?>
      </section>

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
