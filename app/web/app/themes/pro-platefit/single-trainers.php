<?php get_header(); ?>
  <main class="x-main full" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php $full_name = get_field('first_name') . ' ' . get_field('last_name'); ?>
      <article class="container">
        <div class="x-container max width">
          <div class="x-column x-sm x-1-2">
          <?php  $image_attrs = wp_get_attachment_image_src( get_field('profile_image'), 'full' ); ?>
          <img src="<?php echo $image_attrs[0] ?>" alt="<?php echo $full_name; ?>'s Profile Image">
          </div>
          <div class="x-column x-sm x-1-2">
            <div class="x-text x-text-headline">
              <div class="x-text-content">
                <div class="x-text-content-text">
                  <h3 class="x-text-content-text-primary trainer__title">
                    <?php echo $full_name; ?>
                  </h3>
                </div>
              </div>
            </div>
            <div class="x-text" style="margin-top: -15px;">
              <a target="_blank" href="<?php the_field('social_handle_url'); ?>">@<?php the_field('social_handle'); ?></a>
            </div>
            <div class="x-text" style="margin-top: 40px;">
              <?php the_field('biography'); ?>
            </div>
          
            <hr class="x-line">
            <a class="x-btn x-btn-global" style="margin-right: 10px;" href="#schedule">
              VIEW CLASSES<i class="x-icon mvn mls mrn x-icon-long-arrow-right" data-x-icon-s="" aria-hidden="true"></i>
            </a>
            <a class="x-btn x-btn-global" href="mailto:info@platefit.co">
              BOOK A PRIVATE<i class="x-icon mvn mls mrn x-icon-long-arrow-right" data-x-icon-s="" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="x-container max width">
          <section id="schedule" style="padding: 40px 0;">
            <h2 class="x-text-content-text-primary trainer__title trainer__title--upcoming">UPCOMING CLASSES</h2>
            <?php the_field('schedule_widget'); ?>
          </section>
        </div>
      </article>
    <?php endwhile; // end of the loop. ?>
  </main>
<?php get_footer(); ?>
