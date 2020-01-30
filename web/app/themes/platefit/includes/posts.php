<?php

/**
 * Register custom Post Types
 */

function create_post_types() {

    $common = array(
        'public' => true,
        'taxonomies' => array(),
        'hierarchical' => false,
        'supports' => array('title', 'custom-fields'),
    );

    /**
     * Trainer
     */
    $trainer = array(
        'labels' => array('name' => __('Trainers'), 'singular_name' => __('Trainer')),
        'menu_icon' => 'dashicons-universal-access',
        'rewrite' => array('slug' => 'trainers'),
    );
    register_post_type('trainer', array_merge($common, $trainer));

    /**
     * Workouts
     */
    $workout = array(
        'labels' => array('name' => __('Workouts'), 'singular_name' => __('Workout')),
        'menu_icon' => 'dashicons-performance',
        'rewrite' => array('slug' => 'workouts'),
    );
    register_post_type('workout', array_merge($common, $workout));

    /**
     * Location
     */
    $location = array(
        'labels' => array('name' => __('Locations'), 'singular_name' => __('Location')),
        'menu_icon' => 'dashicons-location',
        'rewrite' => array('slug' => 'locations'),
    );
    register_post_type('location', array_merge($common, $location));

    /**
     * Testimonial
     */
    $testimonial = array(
        'labels' => array('name' => __('Testimonials'), 'singular_name' => __('Testimonial')),
        'menu_icon' => 'dashicons-format-quote',
    );
    register_post_type('testimonial', array_merge($common, $testimonial));

    /**
     * Press
     */
    $press = array(
        'labels' => array('name' => __('Press Articles'), 'singular_name' => __('Press Article')),
        'menu_icon' => 'dashicons-text-page',
    );
    register_post_type('press', array_merge($common, $press));

}

add_action('init', 'create_post_types');
