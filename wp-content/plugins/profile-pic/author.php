<?php get_header(); ?>
   <div id="content" class="narrowcolumn profile">

<!-- This sets the $curauth & $authid variables -->
<?php
$curauth = get_userdata(get_query_var('author'));
$authid = $curauth->ID;
?>

<div id="profilebox" class="clearfix">
<h1><?php _e($curauth->display_name);?></h1>
<img src="<?php profilepic_internal_picpath($authid,true,'url');?>"/>
<p class="clearfix">
<?php _e($curauth->user_description);?>
<br/><br/>
Email: <a class="email" href="mailto:<?php  _e($curauth->user_email);?>"><?php _e($curauth->user_email);?></a>
</p>
</div>


<ul>
<!-- The Loop -->
<?php if (have_posts()) : 
	while (have_posts()) :
		the_post();
		cfct_template_file('excerpt','excerpt-default');
	endwhile;
else : ?>
      <p>No posts by this author</p>
<?php endif; ?>
<!-- End Loop -->
</ul>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>