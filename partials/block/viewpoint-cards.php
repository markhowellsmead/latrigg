<?php

use SayHello\Theme\Package\Lazysizes;

if (empty($data['posts'])) {
	return;
}

if (!empty($align = $data['attributes']['align'] ?? $data['attributes']['align'])) {
	$align = ' align' . $align;
}

?>

<section class="c-cardgrid c-cardgrid--four wp-block-mhm-blog-cards<?php echo $align; ?>">
	<div class="c-cardgrid__inner wp-block-mhm-blog-cards__inner">
		<header class="c-cardgrid__header wp-block-mhm-blog-cards__header">
			<h2 class="c-cardgrid__title wp-block-mhm-blog-cards__title"><?php _ex('Latest viewpoints', 'News list default title', 'sht'); ?></h2>
		</header>
		<div class="c-cardgrid__entrieswrap wp-block-mhm-blog-cards__entrieswrap">
			<ul class="c-cardgrid__entries wp-block-mhm-blog-cards__entries">
				<?php foreach ($data['posts'] as $data_post) {
					if (has_post_thumbnail($data_post)) {
						$thumbnail = '<a class="c-cardgrid__figurelink wp-block-mhm-blog-cards__figurelink" href="' . get_permalink($data_post->ID) . '"><figure class="c-cardgrid__figure wp-block-mhm-blog-cards__figure">' . wp_get_attachment_image(get_post_thumbnail_id($data_post->ID), 'card', false, ['class' => 'c-cardgrid__image wp-block-mhm-blog-cards__image']) . '</figure></a>';
					} elseif (!empty($video_url = get_field('video_ref', $data_post->ID))) {
						$thumbnail = pt_must_use_get_instance()->Package->Media->getVideoThumbnail($video_url);
						if (!empty($thumbnail)) {
							$thumbnail = sprintf(
								'<a class="c-cardgrid__figurelink wp-block-mhm-blog-cards__figurelink" href="%s"><figure class="c-cardgrid__figure wp-block-mhm-blog-cards__figure"><img alt="%s" class="c-cardgrid__image wp-block-mhm-blog-cards__image" src="%s"></figure></a>',
								get_the_permalink($data_post->ID),
								get_the_title($data_post->ID),
								$thumbnail
							);
						}
					} else {
						$thumbnail = '<div class="c-cardgrid__figure wp-block-mhm-blog-cards__figure c-cardgrid__figure--empty wp-block-mhm-blog-cards__figure--empty"></div>';
					}
				?>
					<li class="c-cardgrid__entry wp-block-mhm-blog-cards__entry">
						<?php echo $thumbnail; ?>
						<h3 class="c-cardgrid__entrytitle wp-block-mhm-blog-cards__entrytitle">
							<a href="<?php the_permalink($data_post->ID); ?>"><?php echo get_the_title($data_post->ID); ?></a>
						</h3>
						<?php
						if (!empty($ancestors = get_post_ancestors($data_post))) {
							$ancestor_links = [];
							foreach ($ancestors as $ancestor) {
								$ancestor_links[] = sprintf(
									'<a class="c-cardgrid__ancestor-link wp-block-mhm-blog-cards__ancestor-link" href="%s">%s</a>',
									get_the_permalink($ancestor),
									get_the_title($ancestor)
								);
							}
							printf(
								'<p class="c-cardgrid__ancestors wp-block-mhm-blog-cards__ancestors">%s</p>',
								implode(', ', $ancestor_links)
							);
						}
						?>
						<?php if (!empty($excerpt = get_the_excerpt($data_post->ID))) { ?>
							<div class="c-cardgrid__excerpt wp-block-mhm-blog-cards__excerpt">
								<?php echo $excerpt; ?>
							</div>
						<?php
						} ?>
						<div class="c-cardgrid__readmorewrap wp-block-mhm-blog-cards__readmorewrap"><a class="c-cardgrid__readmore wp-block-mhm-blog-cards__readmore o-button o-b
						utton--primary" href="<?php the_permalink($data_post->ID); ?>"><?php _ex('View photos', 'Blog card read more text', 'sht'); ?></a></div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>
