<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

// Unregistering Portfolio CPT
// =============================================================================

add_action( 'after_setup_theme','remove_portfolio_cpt', 100 );

function remove_portfolio_cpt() {   
  remove_action( 'init', 'x_portfolio_init');    
}

// Add Excerpts to the recent post element
function x_shortcode_recent_posts_v2code( $atts ) {
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'type'         => 'post',
    'count'        => '',
    'category'     => '',
    'offset'       => '',
    'orientation'  => '',
    'show_excerpt' => 'false',
    'no_sticky'    => '',
    'no_image'     => '',
    'fade'         => ''
  ), $atts, 'x_recent_posts' ) );

  $allowed_post_types = apply_filters( 'cs_recent_posts_post_types', array( 'post' => 'post' ) );
  $type = ( isset( $allowed_post_types[$type] ) ) ? $allowed_post_types[$type] : 'post';

  $id            = ( $id           != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class        != ''     ) ? 'x-recent-posts cf ' . esc_attr( $class ) : 'x-recent-posts cf';
  $style         = ( $style        != ''     ) ? 'style="' . $style . '"' : '';
  $count         = ( $count        != ''     ) ? $count : 3;
  $category      = ( $category     != ''     ) ? $category : '';
  $category_type = ( $type         == 'post' ) ? 'category_name' : 'portfolio-category';
  $offset        = ( $offset       != ''     ) ? $offset : 0;
  $orientation   = ( $orientation  != ''     ) ? ' ' . $orientation : ' horizontal';
  $show_excerpt  = ( $show_excerpt == 'true' );
  $no_sticky     = ( $no_sticky    == 'true' );
  $no_image      = ( $no_image     == 'true' ) ? $no_image : '';
  $fade          = ( $fade         == 'true' ) ? $fade : 'false';

  $js_params = array(
    'fade' => ( $fade == 'true' )
  );

  $data = cs_generate_data_attributes( 'recent_posts', $js_params );

  $output = "<div {$id} class=\"{$class}{$orientation}\" {$style} {$data} data-fade=\"{$fade}\" >";

    $q = new WP_Query( array(
      'orderby'             => 'date',
      'post_type'           => "{$type}",
      'posts_per_page'      => "{$count}",
      'offset'              => "{$offset}",
      "{$category_type}"    => "{$category}",
      'ignore_sticky_posts' => $no_sticky
    ) );

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();

      if ( $no_image == 'true' ) {
        $image_output       = '';
        $image_output_class = 'no-image';
      } else {
        $image              = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entry-cropped' );
        $bg_image           = ( $image[0] != '' ) ? ' style="background-image: url(' . $image[0] . ');"' : '';
        $image_output       = '<div class="x-recent-posts-img"' . $bg_image . '></div>';
        $image_output_class = 'with-image';
      }

       $excerpt = ( $show_excerpt ) ? '<div class="x-recent-posts-excerpt"><p style="color:initial;">' . preg_replace('/<a.*?more-link.*?<\/a>/', '', cs_get_raw_excerpt() ) . '</p></div>' : '';

      $output .= '<a class="x-recent-post' . $count . ' ' . $image_output_class . '" href="' . get_permalink( get_the_ID() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to: "%s"', 'cornerstone' ), the_title_attribute( 'echo=0' ) ) ) . '">'
                 . '<article id="post-' . get_the_ID() . '" class="' . implode( ' ', get_post_class() ) . '">'
                   . '<div class="entry-wrap">'
                     . $image_output
                     . '<div class="x-recent-posts-content">'
                       . '<h3 class="h-recent-posts">' . get_the_title() . '</h3>'
                       . '<span class="x-recent-posts-date">' . get_the_date() . '</span>'
                        . $excerpt
                     . '</div>'
                   . '</div>'
                 . '</article>'
               . '</a>';

    endwhile; endif; wp_reset_postdata();

  $output .= '</div>';

  return $output;
}

add_action('wp_head', 'change_recent_posts_to_v2');
function change_recent_posts_to_v2() {
  remove_shortcode( 'x_recent_posts' );
  add_shortcode( 'x_recent_posts', 'x_shortcode_recent_posts_v2code' );
}


// Add app banners on mobile
add_action( 'wp_head', function() {
  ?>
    <!-- App Banners -->
    <meta name="apple-itunes-app" content="app-id=1068307601">
    <meta name="google-play-app" content="app-id=com.fitnessmobileapps.platefit">
    <link rel="stylesheet" href="/app/themes/pro-platefit/imports/jquery.smartbanner.css" type="text/css" media="screen">
  <?php
});

// Disable image compression loss
add_filter('jpeg_quality', function($arg){return 100;});

// Register Trainer Post Type
function trainers_post_type() {

	$labels = array(
		'name'                  => _x( 'Trainers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Trainer', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Trainers', 'text_domain' ),
		'name_admin_bar'        => __( 'Trainers', 'text_domain' ),
		'archives'              => __( 'Trainer Archives', 'text_domain' ),
		'attributes'            => __( 'Trainer Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Trainer:', 'text_domain' ),
		'all_items'             => __( 'All Trainers', 'text_domain' ),
		'add_new_item'          => __( 'Add New Trainer', 'text_domain' ),
		'add_new'               => __( 'Add New Trainer', 'text_domain' ),
		'new_item'              => __( 'New Trainer', 'text_domain' ),
		'edit_item'             => __( 'Edit Trainer', 'text_domain' ),
		'update_item'           => __( 'Update Trainer', 'text_domain' ),
		'view_item'             => __( 'View Trainer', 'text_domain' ),
		'view_items'            => __( 'View Trainers', 'text_domain' ),
		'search_items'          => __( 'Search Trainer', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this trainer', 'text_domain' ),
		'items_list'            => __( 'Trainer list', 'text_domain' ),
		'items_list_navigation' => __( 'Trainer list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter trainer list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Trainer', 'text_domain' ),
		'description'           => __( 'PLATEFIT Trainer Profiles', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'trainers', $args );

}
add_action( 'init', 'trainers_post_type', 0 );
