<?php

namespace SayHello\Theme\PostType;

class Page
{

	/**
	 * Allowed values for main content offset and side padding meta fields
	 * These should correspond to the options provided in the editor controls and the CSS variables used in the styles
	 *
	 * @type array
	 */
	private array $main_offset_sizes = [
		'none',
		'small',
		'regular',
		'medium',
		'large',
		'xlarge',
	];

	/**
	 * Allowed values for side padding meta field
	 * These should correspond to the options provided in the editor controls and the CSS variables used in the styles
	 *
	 * @type array
	 */
	private array $side_padding_sizes = [
		'none',
		'small',
		'regular',
		'medium',
		'large',
		'xlarge',
	];

	/**
	 * Register hooks
	 *
	 * @return void
	 */
	public function run(): void
	{
		add_action('init', [$this, 'registerMetaFields']);
		add_action('wp_head', [$this, 'mainOffsetStyle']);
		add_action('wp_head', [$this, 'sidePaddingStyle']);
		add_action('body_class', [$this, 'isOverlappingNav']);
	}

	/**
	 * Register meta fields for page layout options
	 *
	 * @return void
	 */
	public function registerMetaFields(): void
	{
		register_post_meta('page', 'main_offset', [
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string'
		]);

		register_post_meta('page', 'side_padding', [
			'show_in_rest' => true,
			'single' => true,
			'type' => 'string'
		]);

		register_post_meta('page', 'overlapping_nav', [
			'show_in_rest' => true,
			'single' => true,
			'type' => 'boolean'
		]);
	}

	/**
	 * Output custom styles for main content offset based on page meta
	 *
	 * @return void
	 */
	public function mainOffsetStyle(): void
	{
		if (get_post_type() !== 'page') {
			return;
		}

		$main_offset = get_post_meta(get_the_ID(), 'main_offset', true);

		if (is_array($main_offset)) {
			$main_offset = reset($main_offset);
		}

		if (empty($main_offset) || !in_array($main_offset, $this->main_offset_sizes)) {
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

	/**
	 * Output custom styles for page side padding based on page meta
	 *
	 * @return void
	 */
	public function sidePaddingStyle(): void
	{
		if (get_post_type() !== 'page') {
			return;
		}

		$side_padding = get_post_meta(get_the_ID(), 'side_padding', true);

		if (is_array($side_padding)) {
			$side_padding = reset($side_padding);
		}

		if (empty($side_padding) || !in_array($side_padding, $this->side_padding_sizes)) {
			return;
		}


		$size = $side_padding === 'none' ? '0' : "var(--wp--preset--spacing--{$side_padding})";
	?>
		<style>
			.c-main {
				padding-left: <?php echo $size; ?>;
				padding-right: <?php echo $size; ?>;
			}
		</style>
<?php
	}

	/**
	 * Add a class to the body if the page has overlapping nav enabled via meta field
	 *
	 * @param array $classes
	 * @return array
	 */
	public function isOverlappingNav($classes)
	{
		if (get_post_type() !== 'page') {
			return $classes;
		}

		$overlapping_nav = get_post_meta(get_the_ID(), 'overlapping_nav', true);

		if (empty($overlapping_nav)) {
			return $classes;
		}

		$classes[] = 'is-overlapping-nav';

		return $classes;
	}
}
