<?php

use SayHello\Theme\Package\Lazysizes;

$align = '';
if (!empty($args['attributes']['align'])) {
	$align = ' align' . $args['attributes']['align'];
}

if (empty($args['albums'])) {
	return;
}
?>

<div class="wp-block-mhm-albums <?php echo $align; ?>">
	<ul class="wp-block-mhm-albums__entries">
		<?php

		$albums = [];
		foreach ($args['albums'] as $album) {
			$photos = get_posts([
				'post_type' => 'post',
				'numberposts' => 1,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'tax_query' => [
					[
						'taxonomy' => 'album',
						'field' => 'term_id',
						'terms' => $album->term_id,
					]
				]
			]);

			if (!empty($photos)) {
				$albums[strtotime($photos[0]->post_date)] = $album;
			}
		}

		krsort($albums);

		foreach ($albums as $album) {
			$photos = get_posts([
				'post_type' => 'post',
				'numberposts' => 1,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'tax_query' => [
					[
						'taxonomy' => 'album',
						'field' => 'term_id',
						'terms' => $album->term_id,
					]
				]
			]);

			$thumbnail = '<figure class="wp-block-mhm-albums__figure">' . wp_get_attachment_image(get_post_thumbnail_id($photos[0]), 'card', false, ['class' => 'wp-block-mhm-albums__image']) . '</figure>';

			if (!empty($thumbnail_object = get_field('thumbnail', 'term_' . $album->term_id))) {
				$thumbnail = '<figure class="wp-block-mhm-albums__figure">' . wp_get_attachment_image($thumbnail_object['ID'], 'card', false, ['class' => 'wp-block-mhm-albums__image']) . '</figure>';
			}

			printf(
				'<li class="%s"><a href="%s">%s%s</a>%s%s</li>',
				'wp-block-mhm-albums__entry',
				get_term_link($album->term_id, 'album'),
				$thumbnail,
				'<h3 class="wp-block-mhm-albums__entrytitle"><a href="' . get_term_link($album->term_id, 'album') . '">' . $album->name . '</a></h3>',
				'<time class="wp-block-mhm-albums__entrydate">' . sprintf(_x('Latest photo added on %s', '', 'picard'), date(get_option('date_format'), strtotime($photos[0]->post_date))) . '</time>',
				'' //!empty($album->description) ? '<div class="wp-block-mhm-albums__entrydescription">' . $album->description . '</div>' : ''
			);
		}
		?>
	</ul>
</div>
