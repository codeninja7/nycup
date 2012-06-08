<p>
<label for="<?php echo $this->get_field_id('contact_title'); ?>"><?php _e('Contact Title'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" value="<?php echo $contact_title; ?>" />
</p>



<?php 
$contactsdropdown = wp_dropdown_users(array(
	'show'=>'display_name',
	'echo'=>false,
	'name'=>$this->get_field_name('contacts'),
	'id'=>$this->get_field_name('contacts'),
));
?>
<p class="contacts-dropdown">
<label><?php _e('Contacts:'); ?></label>
<?php 
	$pattern = "/value='".$contacts."'/";
	$replacement = "/value='".$contacts."'/ selected='selected'";
	echo preg_replace($pattern,$replacement,$contactsdropdown);
?>
</p>
