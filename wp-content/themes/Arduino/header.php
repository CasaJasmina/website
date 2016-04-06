<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Arduino
 * @since Arduino 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

	<script   src="<?php echo(get_template_directory_uri())?>/js/jquery.js"></script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body>
	<div id="page" class="hfeed site">

	<header>
		<div id="pageheader" class="nav">

		    <div class="row header full-width">
		      <div class="small-10 medium-10 large-2 columns">

		        <!-- those are needed if we want to change wedsite title and claim from the theme admin panel

		        <?php if ( get_theme_mod( 'arduino_logo' ) ) : ?>
				    <div class='site-logo'>
				      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'arduino_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'arduino_small_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

				    </div>
				<?php else : ?>
				    <hgroup>
				        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
				        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
				    </hgroup>
				<?php endif; ?>

				-->


				   <div class='site-logo'>
				      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo bloginfo('template_directory').'/images/logo.png'; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				      <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo bloginfo('template_directory').'/images/logo-small.png'; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>

				    </div>

		      </div>
		      <div class="open-mobile-menu small-2 medium-2 columns right"><div class="vertical-space"></div><span class="mobile-menu"></span></div>
			  <!--[if gte IE 9]><!-->
				<div class="small-12 medium-12 large-10 columns navigation">
				<![endif]-->
				<!--[if IE 8]>
					<div id="navWrapper">
				<![endif]-->
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'walker' => new Nav_Walker_Nav_Menu() ) ); ?>
				</div>
		    </div>

		</div>
	</header>

	<div id="main" class="site-main">
