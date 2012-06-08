<?php
/*
Plugin Name: Author Index Page
Description: Creates an author index landing page. (Will redirect /authors/ to author index page)
Version: 1.0.0
Author: Eric Tsuei
*/

if(!class_exists('Author_Index_Page')) {
	class Author_Index_Page {
		
		public function __construct(){
			if(!is_admin()) {
				add_action( 'template_redirect', array( $this, 'redirectToAppropriateTemplate' ) );
			}
		}
		
		public function addRewriteRules() {
			global $wp_rewrite;
			add_rewrite_rule( 'authors/?$', 'rewrite.php?author-index=1', 'top' );
			$wp_rewrite->flush_rules();
		}
		
		public function redirectToAppropriateTemplate() {
			if ( $_GET['author-index'] ) {
				$this->removeHomeStatus();
				$this->setSEO();
				$html = '';
				$html = wp_cache_get( 'author-index', 1 );
				if ( !$html ) {
					$template = dirname(__FILE__).'/views/author-index-page.php';
					if ( $template ) {
						ob_start();
						include $template;
						$html = ob_get_clean();
						wp_cache_set( 'author-index', $html, 1 );
					}
				}
				if ($html) {
					echo apply_filters( 'author-index', $html );
				}
				exit();
			}
		}
		
		public function removeHomeStatus() {
			global $wp_query;
			$wp_query->is_home = false;
			$wp_query->is_page = true;
		}
		
		public function setSEO() {
			add_filter('aioseop_title_page',array($this,'setPageTitle'));
			add_filter('aioseop_keywords',array($this,'setPageMetaKeywords'));
			add_filter('aioseop_description',array($this,'setPageMetaDescription'));
		}
		
		public function setPageTitle($title){
			$title = get_bloginfo('name').' - NYCUP Staff';
			return $title;
		}
		public function setPageMetaKeywords($keywords){
			$keywords = get_bloginfo('name');
			return $keywords;
		}
		public function setPageMetaDescription($description){
			$description = get_bloginfo('name');
			return $description;
		}
		
	}
	
	global $Author_Index_Page;
	$Author_Index_Page = new Author_Index_Page;

}

register_activation_hook( __FILE__, 'Author_Index_Activated');
register_deactivation_hook( __FILE__, 'Author_Index_Deactivated');

function Author_Index_Activated(){
	global $Author_Index_Page;
	$Author_Index_Page->addRewriteRules();
	//add_action( 'template_redirect', array( $this, 'redirectToAppropriateTemplate' ) );
}

function Author_Index_Deactivated(){
	global $wp_rewrite;
	$wp_rewrite->flush_rules();
}

