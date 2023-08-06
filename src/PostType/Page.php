<?php

namespace SayHello\Theme\PostType;

class Page
{

	public function run()
	{
		add_action('init', [$this, 'registerMetaFields']);
		add_action('wp_head', [$this, 'mainOffsetStyle']);
		add_action('wp_head', [$this, 'sidePaddingStyle']);
	}

	public function registerMetaFields()
	{
		register_post_meta('page', 'main_offset', [
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string',
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			}
		]);

		register_post_meta('page', 'side_padding', [
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string',
			'auth_callback' => function () {
				return current_user_can('edit_posts');
			}
		]);
	}

	public function mainOffsetStyle()
	{
		if (get_post_type() !== 'page') {
			return;
		}

		$main_offset = get_post_meta(get_the_ID(), 'main_offset', true);

		if (empty($main_offset)) {
			return;
		}

		$size = $main_offset === 'none' ? '1px' : "var(--wp--preset--spacing--{$main_offset})";
?>
		<style>
			.c-main {
				--main--offset: <?php echo $size; ?>;
			}
		</style>
	<?php
	}

	public function sidePaddingStyle()
	{
		if (get_post_type() !== 'page') {
			return;
		}

		$side_padding = get_post_meta(get_the_ID(), 'side_padding', true);

		if (empty($side_padding)) {
			return;
		}

		$size = $side_padding === 'none' ? '0' : "var(--wp--preset--spacing--{$side_padding})";
	?>
		<style>
			.c-main {
				--wp--custom--spacing-outer-gutter: <?php echo $size; ?>;
			}
		</style>
<?php
	}
}
