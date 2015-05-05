<?php
/**
 * Plugin Name: casajasmina widget
 * Plugin URI: http://cj_basic.com/widget
 * Description: A widget that serves as an cj_basic for developing more advanced widgets.
 * Version: 0.1
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */



//here I create a custom post type that has a featured image


add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'event',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}


/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */

add_action( 'widgets_init', 'CJ_custom_widget' );

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