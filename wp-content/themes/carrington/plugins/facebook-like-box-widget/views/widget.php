<?php 
echo $before_widget;
?>
<h2><?php _e($instance['title']);?></h2>
<div class="fb-wrapper">
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<fb:like-box href="<?php _e($instance['facebook_url']);?>" width="<?php _e($instance['width']);?>" show_faces="true" stream="false" header="false"></fb:like-box>
<hr />
</div>
<?php 
echo $after_widget;