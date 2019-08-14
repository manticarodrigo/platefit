<?php
/**
* Template Name: Trainers
* @package PLATEFIT
*/

get_header();
?>
  <main class="x-main full" role="main">
    <div class="container">
      <section class="x-container max width" style="padding: 40px 0;">
        <?php while ( have_posts() ) : the_post(); ?>
            <h2 class="h-custom-headline cs-ta-center secondary-header h2" style="color: #333333; text-transform: uppercase;">
              <?php the_field('title'); ?>
            </h2>
            <div class="x-text cs-ta-center">
              <p> <?php the_field('subtitle'); ?></p>
            </div>
        <?php endwhile; // end of the loop. ?>
      </section>
      <section class="x-container max width container--4col" style="padding: 40px 0;">
        <?php
          $args = array(
            'post_type'   => 'trainers',
            'post_status' => 'publish',
            'meta_key' => 'last_name',
            'orderby' => 'meta_value',
            'order'   => 'ASC',
          );
          $trainers = new WP_Query( $args );
          
          if( $trainers->have_posts() ) :
            while( $trainers->have_posts() ) : $trainers->the_post();
            $full_name = get_field('first_name') . ' ' . get_field('last_name');
        ?>
                <article class="container__item container__item--trainer">
                  <a class="x-image" href="<?php the_permalink(); ?>">
                    <?php  $image_attrs = wp_get_attachment_image_src( get_field('profile_image'), 'full' ); ?>
                    <img src="<?php echo $image_attrs[0] ?>" alt="<?php echo $full_name; ?>'s Profile Image">
                  </a>
                  <h3 class="x-text-content-text-primary"><?php echo $full_name; ?></h3>
                  <div class="x-text">
                    <a target="_blank" href="<?php the_field('social_handle_url'); ?>">@<?php the_field('social_handle'); ?></a>
                  </div>
                </article>
              <?php
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
      </section>
    </div>
  </main>
<?php get_footer(); ?>