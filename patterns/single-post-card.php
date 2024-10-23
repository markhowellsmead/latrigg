<?php

/**
 * Title: Single post card
 * Slug: latrigg/single-post-card
 * Categories: Posts
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:sht/primary-media {"hideInlineEmbed":true,"className":"is-style-3x2"} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","margin":{"top":"var:preset|spacing|regular"}}}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--regular)"><!-- wp:post-title {"isLink":true,"fontSize":"medium"} /-->

		<!-- wp:post-date {"format":"F Y","fontSize":"regular"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:post-excerpt {"fontSize":"regular"} /-->
</div>
<!-- /wp:group -->