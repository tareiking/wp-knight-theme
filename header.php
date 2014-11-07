<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WP Knight Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

<?php wp_head(); ?>

<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond-1.1.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5element.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>


	<div style="overflow:hidden;">
	<header class="header" id="header"><!--header-start-->
		<div class="container">
			<figure class="logo animated fadeInDown delay-07s">
				<a href="#"><img src=" <?php echo get_template_directory_uri() ?>/images/logo.png" alt=""></a><!-- #todo : custom logo -->
			</figure>
			<h1 class="animated fadeInDown delay-07s"><?php bloginfo( 'name' ); ?></h1>
			<ul class="we-create animated fadeInUp delay-1s">
				<li><?php bloginfo( 'description' ); ?></li>
			</ul>
				<a class="link animated fadeInUp delay-1s" href="#">TODO</a>
		</div>
	</div>
	</header><!--header-end-->


	<nav class="main-nav-outer" id="main-menu"><!--main-nav-start-->
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tk-knight' ); ?></a>
		<div class="container">

			<!-- #todo : menu has a logo in the middle of the menu, need to add this -->
			<?php wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'main-nav',
					'fallback_cb'    => '',
				)
			); ?>

			<a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
		</div>
	</nav><!--main-nav-end-->


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'tk-knight' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'tk-knight' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
