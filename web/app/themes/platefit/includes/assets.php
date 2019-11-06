<?php

/**
 * Theme assets
 */
function enqueue_assets($editor = false) {
  $template_uri = get_template_directory_uri();
  $manifest = json_decode(file_get_contents($template_uri . '/build/assets.json', true));
  $assets = $editor ? $manifest->editor : $manifest->app;

  wp_enqueue_style('theme-css', $template_uri . "/build/" . $assets->css,  false, null);
  wp_enqueue_script('theme-js', $template_uri . "/build/" . $assets->js, ['jquery'], null, true);
}

function enqueue_editor_assets() {
  enqueue_assets(true);
}

add_action('wp_enqueue_scripts', 'enqueue_assets');
add_action('enqueue_block_editor_assets', 'enqueue_editor_assets');
