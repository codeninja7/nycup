<?php
/*
Plugin Name: RoyalSlider
Plugin URI: http://dimsemenov.com/plugins/royal-slider-wp/
Description: Premium jQuery slider plugin.
Author: Dmitry Semenov
Version: 2.1
Author URI: http://dimsemenov.com
*/

if (!class_exists("RoyalSliderAdmin")) {
	
	require_once dirname( __FILE__ ) . '/RoyalSliderAdmin.php';	
	$royalSlider =& new RoyalSliderAdmin(__FILE__);		
	
	function get_royalslider($id) {
		global $royalSlider;		
		return $royalSlider->get_slider($id);
	}
}

























?>