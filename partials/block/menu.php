<?php

if (empty($menu = $args['attributes']['menu'] ?? '')) {
	return;
}

if (!empty($align = $args['attributes']['align'] ?? '')) {
	$align = " align{$align}";
}

$font_size_class = '';

if (!empty($font_size = $args['attributes']['fontSize'] ?? '')) {
	$font_size_class = " has-{$font_size}-font-size";
}

?>

<div class="wp-block-sht-menu<?php echo $font_size_class . $align; ?>">
	<?php
	wp_nav_menu(
		[
			'menu' => $menu,
			'container' => 'nav',
		]
	);
	?>
</div>
