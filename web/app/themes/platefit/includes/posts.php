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
     * Trainers
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
     * Locations
     */
    $location = array(
        'labels' => array('name' => __('Locations'), 'singular_name' => __('Location')),
        'menu_icon' => 'dashicons-location',
        'rewrite' => array('slug' => 'locations'),
    );
    register_post_type('location', array_merge($common, $location));

    /**
     * Testimonials
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

    /**
     * Announcements
     */
    $announcement = array(
        'labels' => array('name' => __('Announcements'), 'singular_name' => __('Announcement')),
        'menu_icon' => 'dashicons-megaphone',
    );
    register_post_type('announcement', array_merge($common, $announcement));

    /**
     * Modals
     */
    $modal = array(
        'labels' => array('name' => __('Modals'), 'singular_name' => __('Modal')),
        'menu_icon' => 'dashicons-format-status',
    );
    register_post_type('modal', array_merge($common, $modal));
}

add_action('init', 'create_post_types');

function remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta', 'announcement', 'normal');
	remove_meta_box('wpseo_meta', 'modal', 'normal');
}

add_action('add_meta_boxes', 'remove_wp_seo_meta_box', 100);