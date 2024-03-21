<?php

/**
 * Title: archive-photo
 * Slug: latrigg/archive-photo
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"blockGap":"var:preset|spacing|xlarge"}},"className":"c-main"} -->
<main class="wp-block-group c-main"><!-- wp:query {"queryId":0,"query":{"perPage":21,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained","justifyContent":"center","contentSize":null}} -->
	<div class="wp-block-query"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xlarge"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group alignwide"><!-- wp:columns {"verticalAlignment":"bottom","align":"wide"} -->
			<div class="wp-block-columns alignwide are-vertically-aligned-bottom"><!-- wp:column {"verticalAlignment":"bottom","width":"40%"} -->
				<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:40%"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group"><!-- wp:heading {"level":1} -->
						<h1 class="wp-block-heading">Photographic archive</h1>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p>An extensive collection of my photos dating back to 2004, sorted chronologically for your viewing pleasure.</p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"bottom"} -->
				<div class="wp-block-column is-vertically-aligned-bottom"></div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"className":"c-archive__header"} -->
			<div class="wp-block-group c-archive__header"></div>
			<!-- /wp:group -->

			<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":4}} -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group"><!-- wp:sht/primary-media {"hideInlineEmbed":true,"resolution":"thumbnail","className":"is-style-3x2"} /-->

				<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":{"left":"var:preset|spacing|xsmall"}}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile" style="padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:column {"width":"70%"} -->
					<div class="wp-block-column" style="flex-basis:70%"><!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"500"}},"fontSize":"smaller"} /--></div>
					<!-- /wp:column -->

					<!-- wp:column {"width":"30%"} -->
					<div class="wp-block-column" style="flex-basis:30%"><!-- wp:post-date {"textAlign":"right","format":"M Y","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray"}}}},"textColor":"gray","fontSize":"small"} /--></div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->

			<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->

			<!-- wp:query-no-results {"align":"wide"} -->
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group"><!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
				<p class="has-text-align-center">
					<strong>Sorry, but there aren't any entries for this selection at the moment.</strong><br>If you'd like me to add
					some, then feel free to <a href="mailto:mark@permanenttourist.local">get in touch</a>.
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">(Here's a pretty picture, so that you don't feel disappointed.)</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"align":"wide","id":73260,"sizeSlug":"gutenberg_wide","linkDestination":"none"} -->
				<figure class="wp-block-image alignwide size-gutenberg_wide"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/20101021-DSC_0551-Pano-1470x490.webp" alt="<?php echo esc_attr_e('Stockhorn with snow in autumn', 'Latrigg'); ?>" class="wp-image-73260" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:query -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer","className":"site-footer"} /-->