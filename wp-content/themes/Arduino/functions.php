<?php
/**
 * Arduino functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Arduino
 * @since Arduino 1.0
 */
global $ardu_sso;

add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', 'fonts/fonts.css' ) );
register_nav_menu( 'primary', __( 'Navigation Menu', 'arduino' ) );

add_theme_support( 'post-thumbnails' );

add_image_size( 'thumbnail-front', 300, 300, true );
add_image_size( 'thumbnail-big', 945, 500, true );

set_post_thumbnail_size( 200, 200, true );


/* Resizing embed videos


add_filter( 'embed_defaults', 'wps_embed_defaults' );
function wps_embed_defaults( $defaults ) {
		return array( 'width'  => 810, 'height' => 610 );
}*/




/*  Thumbnail upscale
/* ------------------------------------ */
function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
    if ( !$crop ) return null; // let the wordpress default function handle this

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );




if ( ! function_exists( 'arduino_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Arduino 1.0
 */
function arduino_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php

		/*<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'arduino' ); ?></h1>*/
		?>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'arduino' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'arduino' ) ); ?></div>
	<?php endif; ?>

</div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
}
endif;

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Casa Jasmina 1.0
 */
function arduino_scripts_styles() {

	// Add Arduino fonts, used in the main stylesheet.
	wp_enqueue_style( 'arduino-fonts', get_template_directory_uri() . '/fonts/fonts.css', array(), null );

	// Add Generic Icons stylesheet.
	wp_enqueue_style( 'generic-icons', get_template_directory_uri() . '/genericons/genericons.css', array(), null );

	// Add Foundation css
	wp_enqueue_style( 'foundationcss', get_template_directory_uri() . '/css/foundation.min.css', array(), '2015-04-09' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'arduino-style', get_stylesheet_uri(), array(), '2015-04-09' );

	// Loads Arduino custom js scripts
	// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '2015-04-10', true );
	// wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '2015-04-10', true );

	wp_enqueue_script( 'arduino-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '2015-04-10', true );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'arduino_scripts_styles' );


/**
 * Allow logo uploading from Theme Customizer
 *
 * @since Arduino 1.0
 */
function arduino_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'arduino_logo_section' , array(
		'title'       => __( 'Logo', 'arduino' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
		) );

	$wp_customize->add_setting( 'arduino_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arduino_logo', array(
		'label'    => __( 'Logo', 'arduino' ),
		'section'  => 'arduino_logo_section',
		'settings' => 'arduino_logo',
		) ) );

	$wp_customize->add_section( 'arduino_small_logo_section' , array(
		'title'       => __( 'Small Logo', 'arduino' ),
		'priority'    => 30,
		'description' => 'Upload a logo to use in the sticky header',
		) );

	$wp_customize->add_setting( 'arduino_small_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arduino_small_logo', array(
		'label'    => __( 'Small Logo', 'arduino' ),
		'section'  => 'arduino_small_logo_section',
		'settings' => 'arduino_small_logo',
		) ) );

}
add_action( 'customize_register', 'arduino_theme_customizer' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function web2feel_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'web2feel' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		));

	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer',
		'before_widget' => '<div class="botwid col-xs-6 col-md-3 %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="bothead">',
		'after_title' => '</h3>',
		));

	register_sidebar( array(
		'name'          => 'top Banner Area',
		'id'            => 'home_top_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',

		));

	register_sidebar( array(
		'name'          => 'Middle Banner Area',
		'id'            => 'home_middle_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',

		));
}
add_action( 'widgets_init', 'web2feel_widgets_init' );



class Nav_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $DeploySettingsURL;
		global $ardu_sso;
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		if($item->attr_title == 'search') {

			$item_output .= '<form class="header-search-form" action="'.$DeploySettingsURL.'" method="get"><input id="s" name="s" class="header-search-input" type="text" placeholder="Search Blog"><input type="submit" name="btnG" value="search"></form>';
		} else {
			if (isset ($ardu_sso) && $item->attr_title == 'login' && ($ardu_sso->is_logged_in() || $ardu_sso->login())) {
				$res = $ardu_sso->get_user_profile ('avatar');
				if (array_key_exists ('avatar', $res) == false || $res ['avatar'] == '')
					$avatar = $DeploySettingsSSOSite . '/img/user_default.png';
				else
					$avatar = $res ['avatar'];

				$item_output .= '<a href="#" class="userAvatar"><img src="'.$avatar.'" alt="userpicture"/></a><ul id="logout" class="dropdown-logout"><li><a class="logout" href="'.esc_url( wp_logout_url()).'">Sign out</a></li></ul>';
			} else {
				$item_output .= '<a'. $attributes .'><span>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</span>';

				if ( 'primary' == $args->theme_location ) {
					$submenus = 0 == $depth || 1 == $depth ? get_posts( array( 'post_type' => 'nav_menu_item', 'numberposts' => 1, 'meta_query' => array( array( 'key' => '_menu_item_menu_item_parent', 'value' => $item->ID, 'fields' => 'ids' ) ) ) ) : false;
					$item_output .= ! empty( $submenus ) ? ( 0 == $depth ? '<span class="mobile-toggle"></span>' : '<span class="sub-arrow"></span>' ) : '';
				}
				$item_output .= '</a>';
			}
		}
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/* gives child categories the template of parent category */

function load_cat_parent_template($template) {

    $cat_ID = absint( get_query_var('cat') );
    $category = get_category( $cat_ID );

    $templates = array();

    if ( !is_wp_error($category) )
        $templates[] = "category-{$category->slug}.php";

    $templates[] = "category-$cat_ID.php";

    // trace back the parent hierarchy and locate a template
    if ( !is_wp_error($category) ) {
        $category = $category->parent ? get_category($category->parent) : '';

        if( !empty($category) ) {
            if ( !is_wp_error($category) )
                $templates[] = "category-{$category->slug}.php";

            $templates[] = "category-{$category->term_id}.php";
        }
    }

    $templates[] = "category.php";
    $template = locate_template($templates);

    return $template;
}
add_action('category_template', 'load_cat_parent_template');







/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Arduino 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function arduino_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'arduino' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'arduino_wp_title', 10, 2 );

if ( ! function_exists( 'arduino_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Arduino 1.0
 */
function arduino_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<?php

		/*<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'arduino' ); ?></h1> */

		?>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'arduino' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'arduino' ) ); ?></div>
	<?php endif; ?>

</div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
}
endif;

if ( ! function_exists( 'arduino_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Casa Jasmina 1.0
*/
function arduino_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">

		<?php

		/*<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'arduino' ); ?></h1>*/
		?>


		<div class="nav-links">
			<div class="nav-previous">
				<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'arduino' ) ); ?>
			</div>

			<div class="nav-next">

				<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'arduino' ) ); ?>

			</div>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;


if ( ! function_exists( 'arduino_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own arduino_entry_meta() to override in a child theme.
 *
 * @since Casa Jasmina 1.0
 */
function arduino_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'arduino' ) . '</span>';

	// // Translators: used between list items, there is a space after the comma.
	// $categories_list = get_the_category_list( __( ', ', 'arduino' ) );
	// if ( $categories_list ) {
	// 	echo '<span class="categories-links">' . $categories_list . '</span>';
	// }

	// // Translators: used between list items, there is a space after the comma.
	// $tag_list = get_the_tag_list( '', __( ', ', 'arduino' ) );
	// if ( $tag_list ) {
	// 	echo '<span class="tags-links">' . $tag_list . '</span>';
	// }

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author">%1$s - </span>',
			//<!--<a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a>-->
			//esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			//esc_attr( sprintf( __( 'View all posts by %s', 'arduino' ), get_the_author() ) ),
			get_the_author()
			);
	}

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		arduino_entry_date();
}
endif;

if ( ! function_exists( 'arduino_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own arduino_entry_date() to override in a child theme.
 *
 * @since Casa Jasmina 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function arduino_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'arduino' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><time class="entry-date" datetime="%1$s">%2$s</time></span>',
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
		);

	if ( $echo )
		echo $date;

	return $date;
}
endif;
