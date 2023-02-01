<?php

if (empty($data['posts'])) {
	return;
}

if (!empty($align = $data['attributes']['align'] ?? '')) {
	$align = ' align' . $align;
}

?>

<section class="wp-block-mhm-viewpoint-ancestors<?php echo $align; ?>">
	<?php
	$ancestor_links = [];
	foreach ($data['posts'] as $ancestor) {
		$ancestor_links[] = sprintf(
			'<a class="wp-block-mhm-viewpoint-ancestors__ancestor-link" href="%s">%s</a>',
			get_the_permalink($ancestor),
			get_the_title($ancestor)
		);
	}
	printf(
		'<p class="wp-block-mhm-viewpoint-ancestors__ancestors">%s is in %s%s.</p>',
		get_the_title(),
		count($ancestor_links) > 1 ? 'the following areas: ' : '',
		implode(', ', $ancestor_links)
	);
	?>
</section>
