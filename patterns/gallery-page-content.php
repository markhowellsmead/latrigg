<?php

/**
 * Title: Gallery page content
 * Slug: latrigg/gallery-page-content
 * Categories: sht/cover
 * Block Types: core/cover, core/columns
 */

?>

<!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"focalPoint":{"x":0.5,"y":0.5},"minHeight":100,"minHeightUnit":"vh","customGradient":"linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0) 62%,rgb(0,0,0) 100%)","contentPosition":"bottom left","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xxlarge","right":"var:preset|spacing|large","bottom":"var:preset|spacing|xxlarge","left":"var:preset|spacing|large"}}},"withTextShadow":true} -->
	<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left with--text-shadow" style="padding-top:var(--wp--preset--spacing--xxlarge);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--xxlarge);padding-left:var(--wp--preset--spacing--large);min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0) 62%,rgb(0,0,0) 100%)"></span>
		<div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-white-color has-text-color has-link-color"><!-- wp:columns {"verticalAlignment":"bottom"} -->
				<div class="wp-block-columns are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"50%"} -->
					<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:50%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xsmall"}},"layout":{"type":"constrained"},"withTextShadow":true} -->
						<div class="wp-block-group with--text-shadow"><!-- wp:post-title {"level":1} /-->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"constrained"}} -->
							<div class="wp-block-group"><!-- wp:post-excerpt /-->

								<!-- wp:buttons -->
								<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","className":"is-style-with-arrow-down"} -->
									<div class="wp-block-button is-style-with-arrow-down"><a class="wp-block-button__link has-transparent-background-color has-background wp-element-button" href="#gallery">View gallery</a></div>
									<!-- /wp:button -->
								</div>
								<!-- /wp:buttons -->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom"} -->
					<div class="wp-block-column is-vertically-aligned-bottom"></div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->

	<!-- wp:group {"align":"full","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull" id="gallery">
		<!-- wp:meow-gallery/gallery {"images":[],"linkTo":"media","layout":"justified","htmlPreview":"","align":"full"} -->
		[gallery ids="" layout="justified" link="media" align="full"]
		<!-- /wp:meow-gallery/gallery -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
