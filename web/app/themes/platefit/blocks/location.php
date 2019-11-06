<div id="location-<?php echo get_the_ID(); ?>" class="row p-4 p-3-md px-2-sm">
  <div class="border-box p-4 p-3-md px-2-sm col-2 col-1-md">
    <div data-component="map" data-lat="<?php the_field('latitude'); ?>" data-lng="<?php the_field('longitude'); ?>"></div>
  </div>
  <div class="border-box p-4 p-3-md px-2-sm col-2 col-1-md">
    <h2 class="my-0 h3 text-uppercase"><?php the_field('title'); ?></h2>
    <p class="paragraph color-text-dark">
      <?php the_field('address'); ?>
      <br>
      <a class="link dark underline" href="tel:<?php the_field('telephone'); ?>">
        <?php the_field('telephone'); ?>
      </a>
      <br>
      <a class="link dark underline" href="mailto:<?php the_field('email'); ?>">
        <?php the_field('email'); ?>
      </a>
    </p>
    
    <?php if (have_rows('features')): ?>
      <?php while (have_rows('features')) : the_row(); ?>
          <p class="text-bold text-uppercase color-text-dark"><?php the_sub_field('title'); ?></p>

          <?php if (get_sub_field('description')): ?>

            <p class="paragraph color-text-dark"><?php the_sub_field('description'); ?></p>

          <?php elseif (get_sub_field('list')): ?>

            <?php if (have_rows('list')): ?>
              <ul class="pl-0 list-unstyled paragraph color-text-dark">
                <?php while (have_rows('list')) : the_row(); ?>
                  <li><?php the_sub_field('description'); ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>

          <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php if (get_field('schedule')): ?>
      <a class="btn btn--arrow" href="<?php echo get_post_permalink(); ?>">
        View Classes
        <svg><use href="#arrow" /></svg>
      </a>
    <?php endif; ?>
  </div>
</div>
