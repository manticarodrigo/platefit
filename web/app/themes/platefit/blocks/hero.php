<?php
$link = get_field('link');
$title_tag = $link ? 'a' : 'h2';
$extra_attrs = $link ? 'href=' . $link : '';
$has_boxes = get_field('left_box_description') && get_field('right_box_description');
?>
<section class="px-6 px-4-lg px-2-md center bg-cover hero<?php echo $has_boxes ? " hero--with-boxes" : "" ?>" style="background-image: url(<?php the_field('background'); ?>);" data-parallax="cover">
  <<?php echo $title_tag; ?> class="my-0 h1 text-center text-uppercase letter-spacing-sm hero__title" <?php echo $extra_attrs ?>>
    <?php the_field('title'); ?>

  </<?php echo $title_tag; ?>>

  <?php if ($has_boxes) : ?>
    <div class="row box-row">

      <div class="col-2 col-1-sm">
        <div class="p-2 p-0-sm mb-4-sm row end">
          <a href="<?php the_field('left_box_link'); ?>" class="box box--yellow">
            <p class="color-text-dark text-bold text-sm"><?php the_field('left_box_title'); ?></p>
            <h3 class="my-0 box__text"><?php the_field('left_box_description'); ?></h3>
            <svg>
              <use href="#arrow" /></svg>
          </a>
        </div>
      </div>

      <div class="col-2 col-1-sm">
        <div class="p-2 p-0-sm row">
          <a href="<?php the_field('right_box_link'); ?>" class="box">
            <p class="color-text-dark text-bold text-sm"><?php the_field('right_box_title'); ?></p>
            <h3 class="my-0 box__text"><?php the_field('right_box_description'); ?></h3>
            <svg>
              <use href="#arrow" /></svg>
          </a>
        </div>
      </div>

    </div>
  <?php endif; ?>
</section>