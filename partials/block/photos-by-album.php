<?php

if ((bool) ($args['is_preview'] ?? false)) {
	printf('<div class="c-message c-message--info">%s</div>', $args['title']);
	return;
}

if (empty($albums = ($args['sht_album'] ?? []))) {
	return;
}

$number_of_posts = max(1, (int) $args['sht_number_of_posts']);

if (empty($album_posts = get_posts([
	'post_type' => 'post',
	'posts_per_page' => $number_of_posts,
	'tax_query' => [
		[
			'taxonomy' => 'album',
			'field'    => 'term_id',
			'terms'    => $albums,
			'operator' => 'IN',
		],
	],
	'meta_query' => [
		[
			'key' => '_thumbnail_id'
		],
	]
]))) {
	return;
}

$target_height = 300;
$image_size = 'medium';

$align = $args['align'];
if (!empty($args['align'])) {
	$align = 'align' . $args['align'];
}

$unique = uniqid();

?>

<!-- Grid layout origin: https://github.com/xieranmaya/blog/issues/6 #wowza -->
<section class="wp-block-photos-by-album <?php echo $align; ?>">
	<div class="wp-block-photos-by-album__images c-grid500">
		<div class="c-grid500__inner">
			<?php foreach ($album_posts as $album_post) {
				$thumbnail_id = get_post_thumbnail_id($album_post);
				$metadata = wp_get_attachment_metadata($thumbnail_id);
				$source_image_size = $metadata['sizes'][$image_size] ?? null ? $image_size : 'large';
				$width = $metadata['sizes'][$image_size]['width'] ?? $metadata['width'];
				$height = $metadata['sizes'][$image_size]['height'] ?? $metadata['height'];
				$flex_grow = $width * 100 / $height;
				$flex_basis = $width * $target_height / $height;
				$padding_bottom = ($height / $width) * 100;
				$href = get_the_permalink($album_post);
				$fancybox_href = wp_get_attachment_image_url($thumbnail_id, 'gutenberg_full');
			?>
				<div class="wp-block-photos-by-album__entry c-grid500__item" style="flex-grow:<?php echo $flex_grow; ?>;flex-basis:<?php echo $flex_basis; ?>px;">
					<a class="c-grid500__itemlink" href="<?php echo $href; ?>" title="<?php echo get_the_title($album_post); ?>" data-fancybox="image" data-caption="<?php echo get_the_title($album_post); ?>" data-srcset="<?php echo $fancybox_href; ?>">
						<i class="c-grid500__uncollapse" style="padding-bottom:<?php echo $padding_bottom; ?>%"></i>
						<?php
						$image = wp_get_attachment_image($thumbnail_id, $source_image_size, false, ['class' => 'c-grid500__image']);
						echo '<figure class="c-grid500__figure">' . $image . '</figure>';
						if ((bool) get_field('sht_show_captions')) {
							printf('<figcaption class="c-grid500__caption">%s</figcaption>', get_the_title($album_post));
						}
						?>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
