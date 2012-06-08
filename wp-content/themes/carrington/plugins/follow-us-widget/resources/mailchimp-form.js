jQuery(document).ready(function($){
//MailChimp Form Javascript
$mcForm = {
	form : $('#mailchimp-form-container'),
	bg : $('#dropback-underlay'),
	btn : $('#widget_follow_us_widget .subscribe'),
	init : function(){
		var self = this;
		$('.widget_follow_us_widget .subscribe').bind('click',function(){self.showForm()});
		$('#dropback-underlay, #mc_signup_submit').bind('click',function(){self.hideForm()});
	},
	showForm : function(){
		console.log('here');
		var self = this,
		form = $('#mailchimp-form-container'),
		bg = $('#dropback-underlay');
		bg
			.css({display:'block'})
			.animate(
				{opacity:0.8},
				{duration:300,queue:false,easing:'swing',complete:function(){
					form
						.css({display:'block'})
						.animate(
							{opacity:1},
							{duration:300,queue:false,easing:'swing'}
						);
				}}
			);
	},
	hideForm : function(){
		var self = this,
		form = $('#mailchimp-form-container'),
		bg = $('#dropback-underlay');
		form
			.animate(
				{opacity:0},
				{duration:300,queue:false,easing:'swing',complete:function(){
					form.css({display:'none'});
					bg
						.animate(
							{opacity:0},
							{duration:300,queue:false,easing:'swing',complete:function(){bg.css({display:'none'})}}
						);
				}}
			);
	}
}	

$mcForm.init();


});