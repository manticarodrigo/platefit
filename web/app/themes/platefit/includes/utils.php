<?php

/**
 * Render SVG Spritesheet
 */

function print_svgs() {
  $svgs = file_get_contents(get_template_directory_uri() . "/build/app.svg");
  echo '<span class="display-none">' . $svgs . '</span>';
}

add_action('in_admin_header', 'print_svgs');