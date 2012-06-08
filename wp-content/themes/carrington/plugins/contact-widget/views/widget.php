<?php 
$user = get_userdata($instance['contacts']);
echo $before_widget;
?>

<h2>Contact Us</h2>
<div class="img-wrapper">

<img src="<?php profilepic_internal_picpath($instance['contacts'],true,'url');?>" width="300"/>
<div class="backdrop"></div>
<p class="name-email">
<a class="name" href="<?php _e(get_author_posts_url($instance['contacts']))?>"><?php _e($user->display_name);?></a>
<a class="email" href="mailto:<?php  _e($user->user_email);?>"><?php _e($user->user_email);?></a>
</p>
</div>
<p class="description">
<?php
$desc = substr($user->user_description, 0, 200);
_e($desc.' ...');
?>
</p>
<a class="more" href="<?php _e(get_author_posts_url($instance['contacts']))?>">Email <?php _e($user->user_firstname);?> <em></em></a>
<?php
echo $after_widget;
