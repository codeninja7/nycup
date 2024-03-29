<?php

// This file is part of the Carrington Blog Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

$tag_title = '<a href="'.get_tag_link(intval(get_query_var('tag_id'))).'">'.single_tag_title('', false).'</a>';


?>

<div id="content" class="category tag">
<h1><?php printf(__('Tag: %s', 'carrington-blog'), $tag_title); ?></h1>
<?php
	cfct_template_file('loop','loop-default');
	if(function_exists('wp_corenavi')) {
    	wp_corenavi();
	}
?>
</div><!--#content-->

<?php 

get_sidebar();

get_footer();

?>