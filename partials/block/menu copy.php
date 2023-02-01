<?php

if (empty($menu = $args['attributes']['menu'] ?? '')) {
	return;
}

$font_size_class = '';

if (!empty($font_size = $args['attributes']['fontSize'] ?? '')) {
	$font_size_class = " has-{$font_size}-font-size";
}

?>

<div class="wp-block-sht-menu<?php echo $font_size_class; ?>">
	<?php
	wp_nav_menu(
		[
			'menu' => $menu,
			'container' => 'nav',
			'container_class' => "c-menu c-menu--block-menu c-menu--{$menu}",
			'menu_class' => "c-menu c-menu--block-menu c-menu--{$menu}",
		]
	);
	?>
</div>
