<?php
global $Facebook_Comments, $post;

if ( 'open' == $post->comment_status ):
//$options = $FacebookComments->getOptions();
//$appid = $options['moderator_appid'];
?>

<h3>Comments</h3>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<fb:comments href="<?php the_permalink(); ?>" num_posts="5" width="530"></fb:comments>
<?php 
endif;
