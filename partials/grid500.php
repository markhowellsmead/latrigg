<?php

if (!isset($args)) {
	return;
}

$image_ids = $args['post_ids'] ?? [];
if (empty($image_ids) || !is_array($image_ids)) {
	return;
}

$posts = get_posts([
	'post_type' => 'attachment',
	'post_status' => 'inherit',
	'post__in' => $image_ids,
	'orderby' => 'post__in',
	'posts_per_page' => -1,
]);

if (empty($posts)) {
	return;
}

if (!isset($image_size)) {
	$image_size = 'large';
}

if (!isset($target_height)) {
	$target_height = 400;
}

?>
<div class="c-grid500">
	<div class="c-grid500__inner">
		<?php foreach ($posts as $post) {
			$thumbnail_id = get_post_thumbnail_id($post);
			$metadata = wp_get_attachment_metadata($thumbnail_id);
			$source_image_size = $metadata['sizes'][$image_size] ?? null ? $image_size : 'large';
			$width = $metadata['sizes'][$image_size]['width'] ?? $metadata['width'];
			$height = $metadata['sizes'][$image_size]['height'] ?? $metadata['height'];
			$flex_grow = $width * 100 / $height;
			$flex_basis = $width * $target_height / $height;
			$padding_bottom = ($height / $width) * 100;
			$href = get_the_permalink($post);
			$fancybox_href = wp_get_attachment_image_url($thumbnail_id, 'gutenberg_full');
		?>
			<div class="wp-block-photos-by-viewpoint__entry c-grid500__item" style="flex-grow:<?php echo $flex_grow; ?>;flex-basis:<?php echo $flex_basis; ?>px;">
				<a class="c-grid500__itemlink" href="<?php echo $href; ?>" title="<?php echo get_the_title($post); ?>" data-fancybox="image" data-caption="<?php echo get_the_title($post); ?>" data-srcset="<?php echo $fancybox_href; ?>">
					<i class="c-grid500__uncollapse" style="padding-bottom:<?php echo $padding_bottom; ?>%"></i>
					<?php
					echo wp_get_attachment_image($thumbnail_id, $source_image_size, false, ['class' => 'c-grid500__image']);
					if ((bool) get_field('sht_show_captions')) {
						printf('<figcaption class="c-grid500__caption">%s</figcaption>', get_the_title($post));
					}
					?>
				</a>
			</div>
		<?php } ?>
	</div>
</div>