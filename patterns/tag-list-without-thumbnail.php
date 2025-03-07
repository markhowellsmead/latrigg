<?php

/**
 * Title: tag-list-without-thumbnail
 * Slug: latrigg/tag-list-without-thumbnail
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"main","className":"c-main"} -->
<main class="wp-block-group c-main">
	<!-- wp:query {"queryId":0,"query":{"perPage":21,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"layout":{"type":"constrained","justifyContent":"center","contentSize":"64rem","wideSize":"90rem"}} -->
	<div class="wp-block-query">
		<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xlarge"}},"layout":{"type":"constrained","wideSize":"90rem","contentSize":"64rem"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"className":"c-archive__header"} -->
			<div class="wp-block-group c-archive__header">
				<!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

				<!-- wp:term-description {"textAlign":"center"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xlarge"}},"layout":{"type":"grid","columnCount":4}} -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|regular"}}}} -->
				<div class="wp-block-group" style="margin-top: var(--wp--preset--spacing--regular)">
					<!-- wp:post-title {"isLink":true,"fontSize":"medium"} /-->

					<!-- wp:post-date {"format":"F Y","fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->

				<!-- wp:post-excerpt {"fontSize":"smaller"} /-->
			</div>
			<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
			<!-- wp:query-pagination-previous /-->

			<!-- wp:query-pagination-next /-->
			<!-- /wp:query-pagination -->

			<!-- wp:query-no-results {"align":"wide"} -->
			<!-- wp:group {"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
				<p class="has-text-align-center">
					<strong>Sorry, but there aren't any entries for this selection at the moment.</strong><br />If you'd like me to add
					some, then feel free to <a href="mailto:mark@permanenttourist.ch">get in touch</a>.
				</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">(Here's a pretty picture, so that you don't feel disappointed.)</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"sizeSlug":"gutenberg_wide","linkDestination":"none","align":"wide"} -->
				<figure class="wp-block-image alignwide size-gutenberg_wide">
					<img
						src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/20101021-DSC_0551-Pano-1470x490.webp"
						alt="Stockhorn with snow in autumn"
						class="" />
				</figure>
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