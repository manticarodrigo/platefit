<?php if (have_rows('images')): ?>
  <section class="bg-color-light row center">
    <?php
      $peek_size = 250;
      include(locate_template( 'components/slider-images.php', false, false));
    ?>
  </section>
<?php endif; ?>