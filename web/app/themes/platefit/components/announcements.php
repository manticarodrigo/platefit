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

  <aside data-component="navbar-announcements" class="border-box navbar-announcement">
    <div class="px-4 px-3-md px-2-sm container width-full color-dark text-sm overflow-auto">
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php the_field('content') ?>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  </aside>

<?php endif; ?>