<?php

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

?>
<div id="post-excerpt-<?php the_ID() ?>" <?php post_class('excerpt'); ?>>
	<a class="title" href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" rel="bookmark" rev="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
	<span class="by-line">By <a href="<?php _e(get_author_posts_url(get_the_author_meta('ID')));?>" title="<?php _e(attribute_escape(get_the_author()))?>"><?php _e(attribute_escape(get_the_author()))?></a> - Posted <?php the_date(); ?></span>
	<p>
		<?php 
			the_post_thumbnail('excerpt');
			the_excerpt()
		?>
	</p>
	<a class="more" href="<?php the_permalink()?>">Read More<em></em></a>
	
</div><!-- .excerpt -->