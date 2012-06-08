<?php
add_filter('pre_get_posts', 'homepage_loop_filter');
function homepage_loop_filter($query) {
	if ($query->is_home) {
		$featured_category_id = get_cat_id('news');
		$paged = (get_query_var('paged'));
		query_posts( 
			array(
				'cat' => $featured_category_id,
				'paged' => $paged
			) 
		);
	}
	return $query;
}