<?php 
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>
<div align=left><a href="javascript: history.go(-1)" class="arrowleft">&larr; Return to gallery</a></div>
<p align=right> *Click for Larger Photo and Bio* </p>

<div class="ngg-galleryoverview" id="ngg-gallery-<?php echo $gallery->ID ?>">

<?php if ($gallery->show_slideshow) { ?>
	<!-- Slideshow link -->
	<div class="slideshowlink">
		<a class="slideshowlink" href="<?php echo $gallery->slideshow_link ?>">
			<?php echo $gallery->slideshow_link_text ?>
		</a>
	</div>
<?php } ?>

<?php if ($gallery->show_piclens) { ?>
	<!-- Piclense link -->
	<div class="piclenselink">
		<a class="piclenselink" href="<?php echo $gallery->piclens_link ?>">
			<?php _e('[View with PicLens]','nggallery'); ?>
		</a>
	</div>
<?php } ?>
	
	<!-- Thumbnails -->
	<?php foreach ( $images as $image ) : ?>
	
	<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box" <?php echo $image->style ?> >
		<div class="ngg-gallery-thumbnail" >
			
			<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> >
				<?php if ( !$image->hidden ) { ?>
				
		<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> /><div><?php echo $image->ngg_custom_fields["Name"]; ?></div>
		<br />
		<?php if($image->ngg_custom_fields["Staff Position (Staff Only)"]){ ?> 
		<div style="font-size:14px;color:black;font-weight:bold"> <?php echo $image->ngg_custom_fields["Staff Position (Staff Only)"]; ?></div><?php } else {?> <div style="font-size:14px;color:black;font-weight:bold"><?php echo $image->ngg_custom_fields["School & Year"]?></div><?php } ?>
		
		
				<?php } ?>
			</a>
		</div>
	</div>
	
	<?php if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>

 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>