<?php

namespace SayHello\Theme\Package;

/**
 * Multilingual stuff and translations
 *
 * @author Mark Howells-Mead <mark@sayhello.ch>
 */
class Language
{

	public function run()
	{
		add_action('init', [$this, 'loadTranslations']);
	}

	/**
	 * Load the translation files which are delivered with the Theme
	 * Other files - stored in wp-content/languages - are loaded automatically.
	 *
	 * @return void
	 */
	public function loadTranslations()
	{
		load_theme_textdomain('latrigg', get_template_directory() . '/languages');
	}
}
