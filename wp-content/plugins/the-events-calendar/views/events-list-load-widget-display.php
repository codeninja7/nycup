<?php 
/**
 * This is the template for the output of the events list widget. 
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is highly needed.
 *
 * You can customize this view by putting a replacement file of the same name (events-list-load-widget-display.php) in the events/ directory of your theme.
 *
 * @return string
 */

// Vars set:
// '$event->AllDay',
// '$event->StartDate',
// '$event->EndDate',
// '$event->ShowMapLink',
// '$event->ShowMap',
// '$event->Cost',
// '$event->Phone',

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

$event = array();
$tribe_ecp = TribeEvents::instance();
reset($tribe_ecp->metaTags); // Move pointer to beginning of array.
foreach($tribe_ecp->metaTags as $tag){
	$var_name = str_replace('_Event','',$tag);
	$event[$var_name] = tribe_get_event_meta( $post->ID, $tag, true );
}

$event = (object) $event; //Easier to work with.

ob_start();
if ( !isset($alt_text) ) { $alt_text = ''; }
post_class($alt_text,$post->ID);
$class = ob_get_contents();
ob_end_clean();
?>
	<div class=wrapper>
	<div align=center class="event">
        <a href="<?php echo get_permalink($post->ID) ?>">
    		<?php if(has_post_thumbnail($post->ID, 'thumbnail')):
	        $image_id = get_post_thumbnail_id($post->ID);
	        $image_url = wp_get_attachment_image_src($image_id, 'medium', true); ?>
            <div class="imgWrap">
                <img src="<?php echo $image_url[0]; ?>" alt="<?php echo $post->post_title ?>" />
            </div>
		    <?php endif; ?>
		    <div class="backdrop"></div>
            <span><?php echo $post->post_title ?></span>
        </a>
	</div>
    <li <?php echo $class ?>>
        <div style="font-size:80%; z-index:2;"class="when">
        <?php
            $space = false;
            $output = '';
            echo tribe_get_start_date( $post->ID );

                if( tribe_is_multiday( $post->ID ) || !$event->AllDay ) {
                        echo ' - ' . tribe_get_end_date($post->ID);
                 }

            if($event->AllDay) {
                echo ' <small>('.__('All Day','tribe-events-calendar').')</small>';
                }
            ?>
        </div>
    </li>

<?php $alt_text = ( empty( $alt_text ) ) ? 'alt' : ''; ?>
</div>