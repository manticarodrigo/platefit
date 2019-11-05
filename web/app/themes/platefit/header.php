<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<!-- svg sprite sheet -->
		<?php print_svgs() ?>

		<!-- header -->
		<header class="navbar" data-component="navbar">

			<nav class="px-4 px-3-md px-2-sm container navbar__container" data-component="navbar-container">

				<!-- logo -->
				<a class="navbar__logo" href="/" data-component="navbar-logo">
					<svg><use href="#logo"></use></svg>
				</a>

				<!-- toggle (mobile) -->
				<input type="checkbox" data-component="navbar-toggle" />
				
				<!-- backdrop (mobile) -->
				<div class="navbar__mobile-backdrop" data-component="navbar-backdrop"></div>

				<!-- icon (mobile) -->
				<div class="navbar__mobile-icon">
					<span></span>
					<span></span>
					<span></span>
				</div>

				<!-- menu -->
				<ul class="pl-0 list-unstyled row between navbar__menu">
					<?php
						$menu_items = get_nav_menu_items_by_location('primary_navigation');

						foreach ( $menu_items as $item ) {

							echo '<li><a href="'.$item->url.'" title="'.$item->title.'">'.$item->title.'</a></li>';
					
						}
					?>
					<li><a class="btn" href="/schedule">Reserve a Class</a></li>
				</ul>

			</nav>

		</header>