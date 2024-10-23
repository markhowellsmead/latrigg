<?php

/**
 * Title: Sticky post Hero
 * Slug: latrigg/sticky-post-hero
 * Categories: Hero
 */
?>
<!-- wp:query {"queryId":3,"query":{"perPage":"1","pages":0,"offset":"0","postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"only","inherit":false},"enhancedPagination":true,"align":"full"} -->
<div class="wp-block-query alignfull"><!-- wp:post-template -->
	<!-- wp:cover {"useFeaturedImage":true,"focalPoint":{"x":0.35999999999999999,"y":0.63},"minHeight":74.5,"minHeightUnit":"vh","customGradient":"linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0) 59%,rgb(0,0,0) 100%)","contentPosition":"bottom center","style":{"spacing":{"padding":{"top":"var:preset|spacing|xlarge","bottom":"var:preset|spacing|xlarge","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-cover has-custom-content-position is-position-bottom-center" style="padding-top:var(--wp--preset--spacing--xlarge);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xlarge);padding-left:var(--wp--preset--spacing--medium);min-height:74.5vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim has-background-gradient" style="background:linear-gradient(180deg,rgba(0,0,0,0) 0%,rgba(0,0,0,0) 59%,rgb(0,0,0) 100%)"></span>
		<div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
			<div class="wp-block-group alignwide"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|xsmall"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group alignfull"><!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size">From the archives</p>
					<!-- /wp:paragraph -->

					<!-- wp:post-title {"isLink":true,"fontSize":"xxlarge"} /-->

					<!-- wp:post-date {"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group alignfull has-link-color"><!-- wp:post-excerpt {"moreText":"Read blog post"} /--></div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
	</div>
	<!-- /wp:cover -->
	<!-- /wp:post-template -->
</div>
<!-- /wp:query -->