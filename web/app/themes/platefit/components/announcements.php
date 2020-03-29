<?php
$args = array(
  'post_type' => 'announcement',
  'post_status' => 'publish',
  'orderby' => 'modified',
  'order' => 'DESC',
  'posts_per_page' => '1',
);

$query = new WP_Query($args);

if ($query->have_posts()) :
?>
  <?php while ($query->have_posts()) : $query->the_post(); ?>
    <aside data-component="navbar-announcements" class="navbar-announcement border-box row center align-center">
      <a href="<?php the_field('url'); ?>" class="px-4 px-3-md px-2-sm container color-dark text-bold overflow-auto">
        <?php the_field('content'); ?>
        <svg width="40px" height="22px" style="margin-bottom:-5px;">
          <use href="#arrow"></use>
        </svg>
      </a>
    </aside>
  <?php endwhile;
  wp_reset_postdata(); ?>
<?php endif; ?>