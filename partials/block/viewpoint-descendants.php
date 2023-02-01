<?php

if (empty($data['posts'])) {
	return;
}

if (!empty($align = $data['attributes']['align'] ?? '')) {
	$align = ' align' . $align;
}

?>

<section class="wp-block-mhm-viewpoint-descendants<?php echo $align; ?>">
	<?php
	$ancestor_links = [];
	foreach ($data['posts'] as $ancestor) {
		$ancestor_links[] = sprintf(
			'<a class="wp-block-mhm-viewpoint-descendants__descendant-link" href="%s">%s</a>',
			get_the_permalink($ancestor),
			get_the_title($ancestor)
		);
	}

	switch ($data['attributes']['viewpoint_type'] ?? 'place') {
		case 'country':
			$descriptor = _x('Within this country: %2$s.', '', 'picard');
			break;
		case 'region':
			$descriptor = _x('Within this region: %2$s.', '', 'picard');
			break;
		case 'place':
			$descriptor = _x('Related %1$s: %2$s.', '', 'picard');
			break;
	}

	printf(
		'<p class="wp-block-mhm-viewpoint-descendants__descendant">%s</p>',
		sprintf(
			$descriptor,
			count($ancestor_links) > 1 ? 'destinations' : 'destination',
			implode(', ', $ancestor_links)
		),

	);
	?>
</section>
