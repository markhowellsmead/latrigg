<?php

namespace SayHello\Theme;

/**
 * Theme class which gets loaded in functions.php.
 * Defines the Starting point of the Theme and registers Packages.
 *
 * @author Mark Howells-Mead <mark@sayhello.ch>
 */
class Theme
{

	/**
	 * the instance of the object, used for singelton check
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Theme name
	 *
	 * @var string
	 */
	public $name = '';

	/**
	 * Theme version
	 *
	 * @var string
	 */
	public $version = '';

	/**
	 * Debug mode
	 *
	 * @var bool
	 */
	public $debug = false;


	/**
	 * Classes attached to main object
	 *
	 * @var array
	 */
	private $properties = [];

	/**
	 * The Theme object, filled by the constructor
	 *
	 * @var object
	 */
	private $theme;

	public function __construct()
	{
		$this->theme = wp_get_theme();
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->properties)) {
			return $this->properties[$name];
		}

		return null;
	}

	public function __set($name, $value)
	{
		$this->properties[$name] = $value;
	}

	public function run()
	{
		$this->loadClasses(
			[
				Package\Assets::class,
				Package\Gutenberg::class,
				Package\Language::class,
				Package\Media::class,
				Package\Navigation::class,
				Package\Shyify::class,

				PostType\Page::class,
				PostType\Post::class,

			]
		);

		add_action('comment_form_before', [$this, 'enqueueReplyScript']);
		add_shortcode('current_date', [$this, 'currentDate']);

		$this->cleanHead();
	}

	/**
	 * Creates an instance if one isn't already available,
	 * then return the current instance.
	 *
	 * @return object       The class instance.
	 */
	public static function getInstance()
	{
		if (!isset(self::$instance) && !(self::$instance instanceof Theme)) {
			self::$instance = new Theme();

			self::$instance->name    = self::$instance->theme->name;
			self::$instance->version = self::$instance->theme->version;

			if (defined('WP_DEBUG') && WP_DEBUG) {
				self::$instance->debug = true;
			}
		}

		return self::$instance;
	}

	/**
	 * Loads and initializes the provided classes.
	 *
	 * @param $classes
	 */
	private function loadClasses($classes)
	{
		foreach ($classes as $class) {
			$class_parts = explode('\\', $class);
			$class_short = end($class_parts);
			$class_set   = $class_parts[count($class_parts) - 2];

			$key = "{$class_set}_{$class_short}";

			sht_theme()->$key = new $class();

			if (method_exists(sht_theme()->$key, 'run')) {
				sht_theme()->$key->run();
			}
		}
	}

	public function cleanHead()
	{
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('wp_print_styles', 'print_emoji_styles');
	}

	public function enqueueReplyScript()
	{
		if (is_singular() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}

	public function currentDate()
	{
		return "2004 - " . date_i18n('Y');
	}
}
