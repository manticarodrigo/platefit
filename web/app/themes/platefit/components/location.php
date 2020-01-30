<article id="location-<?php echo get_the_ID(); ?>" class="row p-4 p-3-md px-2-sm">
  <div class="border-box p-4 p-3-md px-2-sm col-2 col-1-md">
    <div data-component="map" data-lat="<?php the_field('latitude', get_the_ID()); ?>" data-lng="<?php the_field('longitude', get_the_ID()); ?>"></div>
  </div>
  <div class="border-box p-4 p-3-md px-2-sm col-2 col-1-md">
    <h2 class="my-0 h3 text-uppercase"><?php the_field('title', get_the_ID()); ?></h2>
    <p class="paragraph color-text-dark">
      <?php the_field('address', get_the_ID()); ?>
      <br>
      <a class="link dark underline" href="tel:<?php the_field('telephone', get_the_ID()); ?>">
        <?php the_field('telephone', get_the_ID()); ?>
      </a>
      <br>
      <a class="link dark underline" href="mailto:<?php the_field('email', get_the_ID()); ?>">
        <?php the_field('email', get_the_ID()); ?>
      </a>
    </p>
    
    <?php if (have_rows('features', get_the_ID())): ?>
      <?php while (have_rows('features', get_the_ID())) : the_row(); ?>
          <p class="text-bold text-uppercase color-text-dark"><?php the_sub_field('title'); ?></p>

          <?php if (get_sub_field('description')): ?>

            <p class="paragraph color-text-dark"><?php the_sub_field('description'); ?></p>

          <?php elseif (get_sub_field('list')): ?>

            <?php if (have_rows('list', get_the_ID())): ?>
              <ul class="pl-0 list-unstyled">
                <?php while (have_rows('list', get_the_ID())) : the_row(); ?>
                  <li class="paragraph color-text-dark"><?php the_sub_field('description'); ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>

          <?php endif; ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php if (get_field('schedule', get_the_ID())): ?>
      <a class="btn btn--arrow" href="<?php echo get_post_permalink(); ?>#schedule">
        View Classes
        <svg><use href="#arrow" /></svg>
      </a>
    <?php endif; ?>
  </div>
</article>
