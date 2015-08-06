<?php
/**
 * Plugin Name: casajasmina widget
 * Plugin URI: http://cj_basic.com/widget
 * Description: A widget that serves as an cj_basic for developing more advanced widgets.
 * Version: 0.1
 * Author: Lorenzo Romagnoli
 * Author URI: casajasmina.arduino.cc
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */





function project_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name'  ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Projects' ),
		'all_items'           => __( 'All Projets' ),
		'view_item'           => __( 'View Project' ),
		'add_new_item'        => __( 'Add New Project' ),
		'add_new'             => __( 'Add New' ),
		'edit_item'           => __( 'Edit Project' ),
		'update_item'         => __( 'Update Project' ),
		'search_items'        => __( 'Search Project' ),
		'not_found'           => __( 'Not Found' ),
		'not_found_in_trash'  => __( 'Not found in Trash' ),
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'projects' ),
		'description'         => __( 'Project news and reviews' ),
		'labels'              => $labels,
		'taxonomies' => array('category'),
		// Features this CPT supports in Post Editor
		'supports'            => array( 'thumbnail', 'revisions', 'title' ),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => true,
    'query_var'           => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// Registering your Custom Post Type
	register_post_type( 'projects', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'project_post_type', 0 );







/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */

add_action( 'widgets_init', 'CJ_custom_widget' );


function add_things_category_automatically($post_ID) {
	global $wpdb;
	if(!has_term('','category',$post_ID)){
		$cat = array(32);
		wp_set_object_terms($post_ID, $cat, 'category');
	}
}
add_action('publish_projects', 'add_things_category_automatically');


/**
 * Register our widget.
 * 'CJ_Custom_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function CJ_custom_widget() {
	register_widget( 'CJ_Custom_Widget' );
}

/**
 * CJ_Custom Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class CJ_Custom_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function CJ_Custom_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'cj_basic', 'description' => __('casa jasmina custom banner', 'cj_basic') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'cj_basic-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'cj_basic-widget', __('CJ Basic Widget', 'cj_basic'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
//		$title = apply_filters('widget_title', $instance['title'] );
		$html= $instance['html'];

		$size= $instance['size'];

		$color= $instance['color'];

		/* Before widget (defined by themes). */
	//	echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
	//		echo $before_title . $title . $after_title;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $html ){
			echo ("<div class='columns small-12 medium-6 large-" . $size . "'>" . $html . "</div>");
		}
		/* After widget (defined by themes). */
	//	echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['html'] = $new_instance['html'] ;

		$instance['size'] = $new_instance['size'] ;

		$instance['color'] = $new_instance['color'] ;

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>


		<!-- Widget html: Text area -->
		<p>
			<label for="<?php echo $this->get_field_id( 'html' ); ?>"><?php _e('html:', 'hybrid'); ?></label>
			<textarea
				class="widefat"
				rows="16"
				cols="20"
				id="<?php echo $this->get_field_id( 'html' ); ?>"
				name="<?php echo $this->get_field_name( 'html' ); ?>"
				style="width:100%;" >
			<?php echo $instance['html']; ?>
			</textarea>

		</p>

		<!--section to decide the widget size-->

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Size:', 'hybrid'); ?></label>
			<input
				type="number"
				min="3"
				max="4"
				id="<?php echo $this->get_field_id( 'size' ); ?>"
				name="<?php echo $this->get_field_name( 'size' ); ?>"
				value="<?php echo $instance['size']; ?>" />
		</p>

		<!-- backgound color -->


		<p>
			<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e('Color:', 'hybrid'); ?></label>
			<input
				id="<?php echo $this->get_field_id( 'color' ); ?>"
				name="<?php echo $this->get_field_name( 'color' ); ?>"
				value="<?php echo $instance['color']; ?>"
				style="width:30%;" />
		</p>




	<?php
	}
}
?>
