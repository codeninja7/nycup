<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

if (have_posts()) {
	while (have_posts()) {
		the_post();
		cfct_template_file('excerpt','excerpt-default');
	}
}