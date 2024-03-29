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
?>
<div id="content">
<?php

if (have_posts()) {
	while (have_posts()) {
		the_post();
?>

	<h1 class="page-title"><?php printf(__('Posts by: <a href="%s">%s</a>', 'carrington-blog'), get_author_posts_url(get_the_author_meta('id')), get_the_author_meta('display_name')); ?></h1>

<?php
		$bio = get_the_author_meta('description');
		if (!empty($bio)) {
?>

	<div class="description author-bio">

		<h2><?php printf(__('About %s', 'carrington-blog'), get_the_author_meta('display_name')); ?></h2>
	
<?php 
			echo cfct_basic_content_formatting($bio); 
?>
	
	</div>

<?php
		}
		break;
	}
}
rewind_posts();

cfct_loop();
if(function_exists('wp_corenavi')) {
    wp_corenavi();
}
?>

</div><!--#content-->
<?php

get_sidebar();

get_footer();

?>