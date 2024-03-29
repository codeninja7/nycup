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
cfct_loop();
?>
	<div id="comments">
<?php
comments_template();
?>
	</div><!--#comments-->
	<!-- 
	<div class="pagination-single">
		<span class="previous"><?php previous_post_link() ?></span>
		<span class="next"><?php next_post_link() ?></span>
	</div>
 	-->
</div><!--#content-->

<?php

get_sidebar();

get_footer();

?>