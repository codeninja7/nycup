<?php
/*
Plugin Name: Contact Us Widget
Description: A contact us sidebar widget.
Author: Eric Tsuei.
Version: 1.0
Author URI: http://www.etsuei.com
*/

// Load the widget on widgets_init
function follow_us_widget() {
	register_widget('Follow_Us_Widget');
}
add_action('widgets_init', 'follow_us_widget');

/**
 * SP RecentWidget class
 *
 * @author Shane & Peter, Inc. (Peter Chester)
 **/
class Follow_Us_Widget extends WP_Widget {
	
	var $pluginDomain = 'follow_us_widget';

	/**
	 * Contact Widget constructor
	 *
	 * @return void
	 * @author Eric Tsuei
	 */
	function Follow_Us_Widget() {
		$widget_ops = array( 'classname' => 'widget_follow_us_widget', 'description' => __( 'Follow Us Widget.', $this->pluginDomain ) );
		$control_ops = array( 'id_base' => 'widget_follow_us_widget' );
		$this->WP_Widget('widget_follow_us_widget', __('Follow Us Widget', $this->pluginDomain), $widget_ops, $control_ops);	
	
		add_action('init',array($this,'enqueueMailChimp'));
	}
	
	function enqueueMailChimp(){
		if (!is_admin() && class_exists('mailchimpSF_MCAPI')) {
			wp_register_script( 'mailchimpScript', get_stylesheet_directory_uri().'/plugins/follow-us-widget/resources/mailchimp-form.js', array('jquery'),'',true );
			wp_enqueue_script( 'mailchimpScript' );
		}
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
		include( $this->getTemplateHierarchy( 'widget', 'follow-us-widget' ) );
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
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook_url'] = $new_instance['facebook_url'];
		$instance['twitter_url'] = $new_instance['twitter_url'];
		$instance['rss'] = $new_instance['rss'];
		$instance['subscribe'] = $new_instance['subscribe'];
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
			'title' => __('Follow Us'),
			'facebook_url' => __(''),
			'twitter_url' => __(''),
			'rss' => true,
			'subscribe' => true,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = esc_attr($instance['title']);
		$facebook_url = esc_attr($instance['facebook_url']);
		$twitter_url = esc_attr($instance['twitter_url']);
		$rss = esc_attr($instance['rss']);
		$subscribe = esc_attr($instance['subscribe']);
		include('views/admin.php');
	}
	
	public function getMailChimpWidget(){
		if (class_exists('mailchimpSF_MCAPI')) {
			ob_start();
			the_widget(
				'mailchimpSF_Widget',
				null,
				null
			);	
			$mailchimp = ob_get_clean();
			echo '<div id="dropback-underlay"></div><div id="mailchimp-form-container">'.$mailchimp.'</div>';
		}
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