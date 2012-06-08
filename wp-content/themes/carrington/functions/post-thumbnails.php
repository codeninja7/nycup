<?php
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
  set_post_thumbnail_size( 530, 0 ); // default Post Thumbnail dimensions
  
}

if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'excerpt', 530, 0, false ); // main Post Thumbnail
  add_image_size( 'sidebar', 300, 0, false ); // sidebar Post Thumbnail
}