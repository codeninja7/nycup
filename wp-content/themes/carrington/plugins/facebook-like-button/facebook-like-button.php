<?php
if(!class_exists('Facebook_Like_Button')){
	
	
class Facebook_Like_Button{
	
	public function __construct(){
		add_filter('facebook_like_button_byline',array($this,'renderHTML'));
	}
	
	public function renderHTML($fb_like_btn_byline){		
		$fb_like_btn_byline = '<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#appId=152341858169312&amp;xfbml=1"></script>
<fb:like href="http://www.nycurbanproject.com/" send="true" width="350" show_faces="false" font="arial"></fb:like>';
				
		return $fb_like_btn_byline;
		
	}
}
global $Facebook_Like_Button;
$Facebook_Like_Button = new Facebook_Like_Button();

}//class_exists