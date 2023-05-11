<?php

namespace SayHello\Theme\PostType;

class Page
{

	public function run()
	{
		add_action('init', [$this, 'registerMetaFields']);
		add_action('wp_head', [$this, 'mainOffsetStyle']);
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
}
