<?php

/**
 * Register custom Post Types
 */

function create_post_types() {
    
  // You'll want to replace the values below with your own.
  register_post_type('testimonial',
      array(
          'labels' => array(
              'name' => __('Testimonials'),
              'singular_name' => __('Testimonial'),
          ),
          'public' => true,
          'supports' => array ('title', 'custom-fields'),
          'taxonomies' => array(),
          'hierarchical' => false,
          'menu_icon' => 'dashicons-format-quote',
          'rewrite' => array ('slug' => __('testimonials'))
      )
  );

}

add_action('init', 'create_post_types');
