<?php 
$user = get_userdata($instance['contacts']);
echo $before_widget;
?>

<h2><?php _e($instance['title']);?></h2>
<ul>
<?php 
if(!empty($instance['facebook_url'])){
	echo '<li class="facebook"><a href="'.$instance['facebook_url'].'" target="_blank">Facebook</a></li>';	
}

if(!empty($instance['twitter_url'])){
	echo '<li class="twitter"><a href="'.$instance['twitter_url'].'" target="_blank">Twitter</a></li>';
} 

if(!empty($instance['rss'])){
	echo '<li class="rss"><a href="/?feed=rss2" target="_blank">RSS</a></li>';
} 

if(!empty($instance['subscribe'])){
	echo '<li class="subscribe"><span>Subscribe</span></li>';
} 
echo '</ul>'.$after_widget;

add_action('wp_footer', array($this,'getMailChimpWidget'));

