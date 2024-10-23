<?php

/**
 * Title: Content - Place
 * Slug: latrigg/page-content-mhm-explore
 * Categories: latrigg/post-content
 * Block Types: core/post-content
 * Post Types: mhm-explore, wp_template
 * Viewport width: 1440
 */
?>
<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">
	<!-- wp:media-text {"align":"full","mediaType":"image","mediaWidth":60,"mediaSizeSlug":"large","verticalAlignment":"bottom","imageFill":false,"useFeaturedImage":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
	<div
		class="wp-block-media-text alignfull is-stacked-on-mobile is-vertically-aligned-bottom"
		style="padding-top: 0; padding-right: 0; padding-bottom: 0; padding-left: 0; grid-template-columns: 60% auto">
		<figure class="wp-block-media-text__media"></figure>
		<div class="wp-block-media-text__content">
			<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"constrained","justifyContent":"left"}} -->
			<div
				class="wp-block-group"
				style="margin-top: var(--wp--preset--spacing--medium); margin-bottom: var(--wp--preset--spacing--medium)">
				<!-- wp:post-title {"level":1} /-->

				<!-- wp:post-excerpt /-->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><em>Lead photo: Bla bla bla, YEAR</em></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->

<!-- wp:meow-gallery/gallery {"linkTo":"media","layout":"masonry","htmlPreview":"\u003cp class='meow-error'\u003e\u003cb\u003eMeow Gallery:\u003c/b\u003e The gallery is empty.\u003c/p\u003e","align":"full"} -->
[gallery ids="" layout="masonry" link="media" align="full"]
<!-- /wp:meow-gallery/gallery -->