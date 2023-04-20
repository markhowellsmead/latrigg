<?php

/**
 * Title: Feature Cover Block - 100vh
 * Slug: latrigg/feature-cover-100
 * Categories: sht/cover
 * Block Types: core/cover
 */

$image = get_theme_file_uri('patterns/feature-cover.jpg');

?>

<!-- wp:cover {"url":"<?php echo $image; ?>","dimRatio":80,"focalPoint":{"x":0.5,"y":0.5},"minHeight":100,"minHeightUnit":"vh","gradient":"black-bottom-edge","contentPosition":"bottom left","align":"full"} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-80 has-background-dim wp-block-cover__gradient-background has-background-gradient has-black-bottom-edge-gradient-background"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo $image; ?>" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%" />
	<div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"blockGap":"var:preset|spacing|regular","padding":{"right":"0","left":"0","bottom":"var:preset|spacing|large","top":"0"}}},"textColor":"white","layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-white-color has-text-color has-link-color" style="padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--large);padding-left:0"><!-- wp:heading {"fontSize":"huge"} -->
			<h2 class="wp-block-heading has-huge-font-size">Lorem Ipsum Dolor</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem Ipsum, dolor sit amet lorem ipsum dolor. Sit amet, lorem ipsum.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"transparent","className":"is-style-with-arrow-right"} -->
				<div class="wp-block-button is-style-with-arrow-right"><a class="wp-block-button__link has-transparent-background-color has-background wp-element-button" href="#">View project</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->