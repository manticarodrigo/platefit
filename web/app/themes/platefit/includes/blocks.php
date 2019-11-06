<?php

/**
 * Gutenberg settings
 */

add_theme_support( 'align-wide' );

/**
 * Register custom php gutenberg blocks
 */

function register_acf_block_types() {

  /**
   * Common blocks
   */

  // CTA
  acf_register_block_type(array(
      'name'              => 'cta',
      'title'             => __('CTA'),
      'description'       => __('A call-to-action block with a parallax background, title, and link.'),
      'render_template'   => 'blocks/cta.php',
      'category'          => 'common',
      'icon'              => 'megaphone',
      'keywords'          => array( 'cta', 'common' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  /**
   * Homepage blocks
   */

  // Hero
  acf_register_block_type(array(
      'name'              => 'homepage-hero',
      'title'             => __('Homepage Hero'),
      'description'       => __('A hero block with a parallax background, title, and link boxes.'),
      'render_template'   => 'blocks/homepage-hero.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'hero', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // About
  acf_register_block_type(array(
      'name'              => 'homepage-about',
      'title'             => __('Homepage About'),
      'description'       => __('An about block with a title, shoutout, description and link.'),
      'render_template'   => 'blocks/homepage-about.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'about', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // Plate
  acf_register_block_type(array(
      'name'              => 'homepage-plate',
      'title'             => __('Homepage Plate'),
      'description'       => __('A plate block with video, quotes, description and image.'),
      'render_template'   => 'blocks/homepage-plate.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'plate', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // Press
  acf_register_block_type(array(
      'name'              => 'homepage-press',
      'title'             => __('Homepage Press'),
      'description'       => __('A press block with background, links, and images.'),
      'render_template'   => 'blocks/homepage-press.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'press', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // Our Story
  acf_register_block_type(array(
      'name'              => 'homepage-our-story',
      'title'             => __('Homepage Our Story'),
      'description'       => __('An our story block with two images, title, description, and link.'),
      'render_template'   => 'blocks/homepage-our-story.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'our-story', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // Community
  acf_register_block_type(array(
      'name'              => 'homepage-community',
      'title'             => __('Homepage Community'),
      'description'       => __('A community block with insta feed, title, description, and link.'),
      'render_template'   => 'blocks/homepage-community.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'community', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));

  // App
  acf_register_block_type(array(
      'name'              => 'homepage-app',
      'title'             => __('Homepage App'),
      'description'       => __('An app block with title, description, links and image.'),
      'render_template'   => 'blocks/homepage-app.php',
      'category'          => 'common',
      'icon'              => 'store',
      'keywords'          => array( 'app', 'homepage' ),
      'align'             => 'full',
      'supports'          => array('multiple' => false),
  ));
}

if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types');
}
