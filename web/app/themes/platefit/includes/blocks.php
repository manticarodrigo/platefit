<?php

/**
 * Gutenberg settings
 */

add_theme_support('align-wide');

function filter_block_categories($categories)
{
  return array_merge(
    array(
      array(
        'slug' => 'global',
        'title' => __('Global', 'platefit'),
        'icon'  => 'admin-site',
      )
    ),
    $categories
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

  // Flexible Content
  acf_register_block_type(array(
    'name'              => 'flexible-content',
    'title'             => __('Flexible Content'),
    'description'       => __('A flexible content block.'),
    'render_template'   => 'blocks/flexible-content.php',
    'category'          => 'global',
    'icon'              => 'layout',
    'keywords'          => array('flexible-content'),
    'align'             => 'full',
  ));

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

  // Insta Feed
  acf_register_block_type(array(
    'name'              => 'insta-feed',
    'title'             => __('Insta Feed'),
    'description'       => __('An insta-feed block.'),
    'render_template'   => 'blocks/insta-feed.php',
    'category'          => 'global',
    'icon'              => 'screenoptions',
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

  // Press
  acf_register_block_type(array(
    'name'              => 'press',
    'title'             => __('Press'),
    'description'       => __('A press block.'),
    'render_template'   => 'blocks/press.php',
    'category'          => 'global',
    'icon'              => 'media-document',
    'keywords'          => array('press'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Trainers
  acf_register_block_type(array(
    'name'              => 'trainers',
    'title'             => __('Trainers'),
    'description'       => __('A trainers block.'),
    'render_template'   => 'blocks/trainers.php',
    'category'          => 'global',
    'icon'              => 'universal-access',
    'keywords'          => array('trainers'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Healcode Widget
  acf_register_block_type(array(
    'name'              => 'healcode-widget',
    'title'             => __('Healcode Widget'),
    'description'       => __('A MindBody/Healcode widget block.'),
    'render_template'   => 'blocks/healcode-widget.php',
    'category'          => 'global',
    'icon'              => 'editor-code',
    'keywords'          => array('healcode'),
    'align'             => 'full',
  ));

  // Pricing
  acf_register_block_type(array(
    'name'              => 'pricing',
    'title'             => __('Pricing'),
    'description'       => __('A pricing block.'),
    'render_template'   => 'blocks/pricing.php',
    'category'          => 'global',
    'icon'              => 'tickets-alt',
    'keywords'          => array('pricing'),
    'align'             => 'full',
  ));

  // Plate
  acf_register_block_type(array(
    'name'              => 'the-plate',
    'title'             => __('The Plate'),
    'description'       => __('A plate block with video, quotes, description and image.'),
    'render_template'   => 'blocks/the-plate.php',
    'category'          => 'global',
    'icon'              => 'groups',
    'keywords'          => array('plate'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));

  // Mobile App
  acf_register_block_type(array(
    'name'              => 'mobile-app',
    'title'             => __('Mobile App'),
    'description'       => __('A mobile app block with title, description, links and image.'),
    'render_template'   => 'blocks/mobile-app.php',
    'category'          => 'global',
    'icon'              => 'smartphone',
    'keywords'          => array('mobile-app'),
    'align'             => 'full',
    'supports'          => array('multiple' => false),
  ));
}

if (function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}
