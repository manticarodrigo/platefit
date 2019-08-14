<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/MIXINS_ELEMENTS/NAV-MODAL.PHP
// -----------------------------------------------------------------------------
// V2 element mixins.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Controls
//   02. Control Groups
//   03. Values
// =============================================================================

// Controls
// =============================================================================

function x_controls_element_nav_modal( $adv = false ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/_.php' );

  $cond_adv           = array( 'adv' => $adv );

  $menu_adv           = x_bar_module_settings_menu( 'modal', $cond_adv );
  $toggle_adv         = x_bar_module_settings_anchor( 'toggle', $cond_adv );
  $modal_adv          = $cond_adv;
  $links_adv          = x_bar_module_settings_anchor( 'menu-item-modal', $cond_adv );

  $menu_std           = x_bar_module_settings_menu( 'modal' );
  $toggle_std_content = x_bar_module_settings_anchor( 'toggle', array( 'inc_t_pre' => true, 'group' => $group_std_content ) );
  $toggle_std_design  = x_bar_module_settings_anchor( 'toggle', array( 'inc_t_pre' => true, 'group' => $group_std_design ) );
  $links_std_content  = x_bar_module_settings_anchor( 'menu-item-modal', array( 'inc_t_pre' => true, 'group' => $group_std_content ) );
  $links_std_design   = x_bar_module_settings_anchor( 'menu-item-modal', array( 'inc_t_pre' => true, 'group' => $group_std_design ) );

  if ( $adv ) {

    $controls = array_merge(
      x_controls_menu_adv( $menu_adv ),
      x_controls_anchor_adv( $toggle_adv ),
      x_controls_modal_adv( $modal_adv ),
      x_controls_anchor_adv( $links_adv ),
      x_controls_omega( $settings_add_toggle_hash )
    );

  } else {

    $controls = array_merge(

      x_controls_menu_std_content( $menu_std ),
      x_controls_anchor_std_content( $toggle_std_content ),
      x_controls_anchor_std_content( $links_std_content ),

      x_controls_menu_std_design_setup( $menu_std ),
      x_controls_anchor_std_design_setup( $toggle_std_design ),
      x_controls_modal_std_design_setup(),
      x_controls_anchor_std_design_setup( $links_std_design ),

      x_controls_anchor_std_design_colors( $toggle_std_design ),
      x_controls_modal_std_design_colors(),
      x_controls_anchor_std_design_colors( $links_std_design ),

      x_controls_omega( array_merge( $settings_std_customize, $settings_add_toggle_hash ) )

    );

  }

  return $controls;

}



// Control Groups
// =============================================================================

function x_control_groups_element_nav_modal( $adv = false ) {

  $menu   = x_bar_module_settings_menu( 'modal' );
  $toggle = x_bar_module_settings_anchor( 'toggle' );
  $links  = x_bar_module_settings_anchor( 'menu-item-modal' );

  if ( $adv ) {

    $control_groups = array_merge(
      x_control_groups_menu( $menu ),
      x_control_groups_anchor( $toggle ),
      x_control_groups_modal(),
      x_control_groups_anchor( $links ),
      x_control_groups_omega()
    );

  } else {

    $control_groups = x_control_groups_std( array( 'group_title' => __( 'Navigation Modal', '__x__' ) ) );

  }

  return $control_groups;

}



// Values
// =============================================================================

function x_values_element_nav_modal( $settings = array() ) {

  include( dirname( __FILE__ ) . '/../mixins_setup/_.php' );

  $menu   = x_bar_module_settings_menu( 'modal' );
  $toggle = x_bar_module_settings_anchor( 'toggle' );
  $links  = x_bar_module_settings_anchor( 'menu-item-modal' );

  $values = array_merge(
    x_values_menu( $menu ),
    x_values_anchor( $toggle ),
    x_values_modal(),
    x_values_anchor( $links ),
    x_values_omega( $settings_add_toggle_hash )
  );

  return x_bar_mixin_values( $values, $settings );

}
