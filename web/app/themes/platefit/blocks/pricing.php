<?php if (have_rows('sections')): ?>
  <script src="https://widgets.healcode.com/javascripts/healcode.js" type="text/javascript"></script>

  <?php if(!empty($_GET["mb_link"])): ?>
    <span class="display-none" data-component="mindbody-modal">
      <healcode-widget
        data-version="0.2"
        data-link-class="healcode-pricing-option-text-link"
        data-site-id="16612"
        data-mb-site-id="311100"
        data-type="pricing-link"
        data-inner-html="Buy Now"
        data-service-id="<?php echo $_GET["mb_link"] ?>"
      />
    </span>
  <?php endif; ?>

  <section class="py-5 px-4 bg-color-light">

    <?php while (have_rows('sections')) : the_row(); ?>

      <article class="py-3 max-width text-center">
        <h3 class="mb-0 text-center text-uppercase letter-spacing-sm dark"><?php the_sub_field('title'); ?></h3>
        <p class="mt-0 text-center"><?php the_sub_field('description'); ?></strong></p>

        <?php if (have_rows('contracts')): ?>
          <ul class="pl-0 list-unstyled">
            <?php while (have_rows('contracts')) : the_row(); ?>
              <li class="mb-2">
                <healcode-widget
                  data-version="0.2"
                  data-link-class="link dark underline text-lg"
                  data-site-id="16612"
                  data-mb-site-id="311100"
                  data-type="<?php the_sub_field('contract_type'); ?>-link"
                  data-inner-html="<?php the_sub_field('link_text'); ?>"
                  data-service-id="<?php the_sub_field('contract_id'); ?>"
                />
              </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <?php if (get_sub_field('content')): ?>
          <p><?php the_sub_field('content'); ?></p>
        <?php endif; ?>

      </article>

    <?php endwhile; ?>

  </section>
<?php endif; ?>
