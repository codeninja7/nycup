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

<div id="content" class="authors-index">
<h1><?php echo 'NYC Urban Project Staff'; ?></h1>
<?php 
global $wpdb;
$exclude_admin = true;
$authors = $wpdb->get_results("SELECT ID from $wpdb->users " . ($exclude_admin ? "WHERE user_login <> 'shinobistudio' " : '') . "ORDER BY user_registered"); 
$author_count = array(); 

echo '<ul class="authors">'; 
foreach ( (array) $authors as $author ) { 
        $curauth = get_userdata( $author->ID ); 
        $name = $curauth->display_name;
        if($curauth->user_level < 7) continue;
?>
	<li>
		<h2><a href="<?php _e(get_author_posts_url($author->ID))?>"><?php _e($curauth->display_name);?></a></h2>
		<img src="<?php profilepic_internal_picpath($author->ID,true,'url');?>" width="200"/>
		<p class="clearfix">
		<?php 
		$desc = substr($curauth->user_description, 0, 300);
		_e($desc.' ...');
		?>
		<br/><br/>
		<?php if(!($curauth->user_email == '')):?>
		Email: <a class="email" href="mailto:<?php  _e($curauth->user_email);?>"><?php _e($curauth->user_email);?></a>
		<?php endif;?>
		</p>
		<hr/>
	</li>
<?php
} 

echo '</ul>'; 

?>
	
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