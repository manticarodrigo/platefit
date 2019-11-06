<?php

/**
 * Gutenberg settings
 */

add_theme_support('align-wide');

function filter_block_categories($categories)
{
  return array(
    array(
      'slug' => 'global',
      'title' => __('Global', 'platefit'),
      'icon'  => 'admin-site',
    ),
    array(
      'slug' => 'homepage',
      'title' => __('Homepage', 'platefit'),
      'icon'  => 'store',
    ),
  );
}

add_filter('block_categories', 'filter_block_categories', 10, 1);

/**
 * Register custom php gutenberg blocks
 */

function register_acf_block_types()
{

  /**
   * Global blocks
   */

  // Hero
  acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Hero'),
    'description'       => __('A hero block with a parallax background, title, and optional link boxes.'),
    'render_template'   => 'blocks/hero.php',
    'category'          => 'global',
    'icon'              => 'align-center',
    'keywords'          => array('hero'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // CTA
  acf_register_block_type(array(
    'name'              => 'cta',
    'title'             => __('CTA'),
    'description'       => __('A call-to-action block with a parallax background, title, and link.'),
    'render_template'   => 'blocks/cta.php',
    'category'          => 'global',
    'icon'              => 'megaphone',
    'keywords'          => array('cta'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Testimonials
  acf_register_block_type(array(
    'name'              => 'testimonials',
    'title'             => __('Testimonials'),
    'description'       => __('A testimonials block.'),
    'render_template'   => 'blocks/testimonials.php',
    'category'          => 'global',
    'icon'              => 'format-quote',
    'keywords'          => array('testimonials'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Insta Feed
  acf_register_block_type(array(
    'name'              => 'insta-feed',
    'title'             => __('Insta Feed'),
    'description'       => __('An insta-feed block.'),
    'render_template'   => 'blocks/insta-feed.php',
    'category'          => 'global',
    'icon'              => 'screen-options',
    'keywords'          => array('insta-feed'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Image Slider
  acf_register_block_type(array(
    'name'              => 'image-slider',
    'title'             => __('Image Slider'),
    'description'       => __('An image slider block.'),
    'render_template'   => 'blocks/image-slider.php',
    'category'          => 'global',
    'icon'              => 'images-alt',
    'keywords'          => array('image-slider'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Section Intro
  acf_register_block_type(array(
    'name'              => 'section-intro',
    'title'             => __('Section Intro'),
    'description'       => __('A section intro block.'),
    'render_template'   => 'blocks/section-intro.php',
    'category'          => 'global',
    'icon'              => 'editor-paragraph',
    'keywords'          => array('section-intro'),
    'align'             => 'full',
  ));

  // Schedule
  acf_register_block_type(array(
    'name'              => 'schedule',
    'title'             => __('Schedule'),
    'description'       => __('A MindBody schedule block.'),
    'render_template'   => 'blocks/schedule.php',
    'category'          => 'global',
    'icon'              => 'calendar-alt',
    'keywords'          => array('schedule'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  /**
   * Homepage blocks
   */

  // About
  acf_register_block_type(array(
    'name'              => 'homepage-about',
    'title'             => __('Homepage About'),
    'description'       => __('An about block with a title, shoutout, description and link.'),
    'render_template'   => 'blocks/homepage-about.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('about', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Plate
  acf_register_block_type(array(
    'name'              => 'homepage-plate',
    'title'             => __('Homepage Plate'),
    'description'       => __('A plate block with video, quotes, description and image.'),
    'render_template'   => 'blocks/homepage-plate.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('plate', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Press
  acf_register_block_type(array(
    'name'              => 'homepage-press',
    'title'             => __('Homepage Press'),
    'description'       => __('A press block with background, links, and images.'),
    'render_template'   => 'blocks/homepage-press.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('press', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Our Story
  acf_register_block_type(array(
    'name'              => 'homepage-our-story',
    'title'             => __('Homepage Our Story'),
    'description'       => __('An our story block with two images, title, description, and link.'),
    'render_template'   => 'blocks/homepage-our-story.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('our-story', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Community
  acf_register_block_type(array(
    'name'              => 'homepage-community',
    'title'             => __('Homepage Community'),
    'description'       => __('A community block with insta feed, title, description, and link.'),
    'render_template'   => 'blocks/homepage-community.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('community', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // App
  acf_register_block_type(array(
    'name'              => 'homepage-app',
    'title'             => __('Homepage App'),
    'description'       => __('An app block with title, description, links and image.'),
    'render_template'   => 'blocks/homepage-app.php',
    'category'          => 'homepage',
    'icon'              => 'store',
    'keywords'          => array('app', 'homepage'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));
}

if (function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}
