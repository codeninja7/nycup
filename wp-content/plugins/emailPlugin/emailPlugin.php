<?php
/*
Plugin Name: emailTest
Plugin URI: http://wordpress01.localhost/
Description: This is a test plugin
Author: etsuei
Author URI: http://wordpress01.localhost/
*/

function email_friends($post_ID)  {
    $friends = 'bob@example.org,susie@example.org';
    /*
    mail($friends, "sally's blog updated", 
      'I just put something on my blog: http://blog.example.com');
    */
    return $post_ID;
}

add_action ( 'publish_post', 'email_friends' );

?>