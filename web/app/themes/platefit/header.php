<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="apple-itunes-app" content="app-id=1068307601">

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#fed710">
    <meta name="msapplication-TileColor" content="#fed710">
		<meta name="theme-color" content="#fed710">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-T33B74V');</script>
		<!-- End Google Tag Manager -->

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T33B74V"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<!-- svg spritesheet -->
		<?php print_svgs() ?>

		<!-- header -->
		<header class="navbar" data-component="navbar" id="platefit-header">

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