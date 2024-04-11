<?php

namespace SayHello\Theme\Package;

/**
 * Everything to do with images, videos etc
 *
 * @author Mark Howells-Mead <mark@sayhello.ch>
 */
class Media
{

	public function run()
	{
		add_filter('embed_defaults', [$this, 'setEmbedDefaults'], 10, 0);
	}

	/**
	 * Set default sizes for all embeds, e.g. YouTube videos
	 *
	 * @return array
	 */
	public function setEmbedDefaults()
	{
		return [
			'width' => 1280,
			'height' => 720
		];
	}
}
