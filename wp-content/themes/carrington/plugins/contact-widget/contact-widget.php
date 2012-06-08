<?php
/*
Plugin Name: Contact Us Widget
Description: A contact us sidebar widget.
Author: Eric Tsuei.
Version: 1.0
Author URI: http://www.etsuei.com
*/

// Load the widget on widgets_init
function contact_widget() {
	register_widget('Contact_Widget');
}
add_action('widgets_init', 'contact_widget');

/**
 * SP RecentWidget class
 *
 * @author Shane & Peter, Inc. (Peter Chester)
 **/
class Contact_Widget extends WP_Widget {
	
	var $pluginDomain = 'contact_widget';

	/**
	 * Contact Widget constructor
	 *
	 * @return void
	 * @author Eric Tsuei
	 */
	function Contact_Widget() {
		$widget_ops = array( 'classname' => 'widget_contact_widget', 'description' => __( 'Display Contact Widget.', $this->pluginDomain ) );
		$control_ops = array( 'id_base' => 'widget_contact_widget' );
		$this->WP_Widget('widget_contact_widget', __('Contact Widget', $this->pluginDomain), $widget_ops, $control_ops);	
	}
	
	/**
	 * Widget frontend output
	 *
	 * @param array $args 
	 * @param array $instance 
	 * @return void
	 * @author Eric Tsuei
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		include( $this->getTemplateHierarchy( 'widget', 'contact-widget' ) );
	}

	/**
	 * Update widget options
	 *
	 * @param object $new_instance Widget Instance
	 * @param object $old_instance Widget Instance 
	 * @return object
	 * @author Eric Tsuei
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['contact_title'] = strip_tags($new_instance['contact_title']);
		$instance['contacts'] = $new_instance['contacts'];
		return $instance;
	}

	/**
	 * Form UI
	 *
	 * @param object $instance Widget Instance
	 * @return void
	 * @author Shane & Peter, Inc. (Peter Chester)
	 */
	function form( $instance ) {
		$defaults = array( 
			'contact_title' => __('Contact Us'),
			'contacts' => __(array()),
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$contact_title = esc_attr($instance['contact_title']);
		$contacts = $instance['contacts'];
		include('views/admin.php');
	}

	/**
	 * Loads theme files in appropriate hierarchy: 1) child theme, 
	 * 2) parent template, 3) plugin resources. will look in the onair-widget/
	 * directory in a theme and the views/ directory in the plugin
	 *
	 * @param string $template template file to search for
	 * @return template path
	 * @author Shane & Peter, Inc. (Matt Wiebe)
	 **/

	function getTemplateHierarchy($template,$path) {
		// whether or not .php was added
		$template_slug = rtrim($template, '.php');
		$template = $template_slug . '.php';
		
		if ( $theme_file = locate_template( array( trailingslashit($path) . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = 'views/' . $template;
		}
		return apply_filters( 'template_' . $path . '_' . $template_slug, $file, $template );
	}
}
?>