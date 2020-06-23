<?php
$args = array(
  'post_type' => 'modal',
  'post_status' => 'publish',
  'orderby' => 'modified',
  'order' => 'DESC',
  'posts_per_page' => '10',
);

$query = new WP_Query($args);

if ($query->have_posts()) :
?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <aside class="modal modal-slide" id="modal-<?php the_ID(); ?>" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="px-4 px-2-sm modal__container bg-plate bg-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title-<?php the_ID(); ?>">
          <header class="py-4 modal__header">
            <button class="modal__close" aria-label="Close dialog" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="modal-content-<?php the_ID(); ?>">
            <h2 class="my-0 text-uppercase letter-spacing" id="modal-title-<?php the_ID(); ?>">
              <?php the_field('title'); ?>
            </h2>
            <?php the_field('content'); ?>
            <?php
            if (get_field('form') === 'newsletter') {
              render_newsletter_form(true);
            }
            if (get_field('form') === 'contact') {
              render_contact_form();
            }
            ?>
          </main>
          <footer class="py-4 modal__footer">
            <button class="link dark underline" data-micromodal-close aria-label="Close this dialog window">
              No thanks.
            </button>
          </footer>
        </div>
      </div>
    </aside>
  <?php endwhile;
  wp_reset_postdata(); ?>
<?php endif; ?>