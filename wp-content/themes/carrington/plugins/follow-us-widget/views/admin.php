<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Follow Us Title'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('facebook_url'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo $facebook_url; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter URL'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('twitter_url'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo $twitter_url; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('Show RSS'); ?></label>
<input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="checkbox" <?php if($rss) _e('checked="checked"'); ?> />
</p>

<p>
<label for="<?php echo $this->get_field_id('subscribe'); ?>"><?php _e('Show Subscribe'); ?></label>
<input id="<?php echo $this->get_field_id('subscribe'); ?>" name="<?php echo $this->get_field_name('subscribe'); ?>" type="checkbox" <?php if($subscribe) _e('checked="checked"'); ?> />
</p>