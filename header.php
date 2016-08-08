<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

	<nav class="site" id="nav_header">
    <!-- Logo -->
    <span class="nav-head logo">
      <span class="nav-outer">
        <span class="nav-inner">
          <a href="<?php bloginfo('url'); ?>">
            Logo
          </a>
        </span>
      </span>
    </span>

    <!-- Main Menu -->
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
	</nav>

	<main>
