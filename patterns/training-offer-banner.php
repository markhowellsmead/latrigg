<?php

/**
 * Title: Training offer banner
 * Slug: latrigg/training-offer-banner
 * Categories: Call to Action
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|regular","bottom":"var:preset|spacing|regular","left":"var:preset|spacing|regular","right":"var:preset|spacing|regular"},"blockGap":"var:preset|spacing|small"},"border":{"radius":"4px","width":"2px"}},"backgroundColor":"xlight-primary","borderColor":"primary-verylight","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-primary-verylight-border-color has-xlight-primary-background-color has-background" style="border-width:2px;border-radius:4px;padding-top:var(--wp--preset--spacing--regular);padding-right:var(--wp--preset--spacing--regular);padding-bottom:var(--wp--preset--spacing--regular);padding-left:var(--wp--preset--spacing--regular)"><!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"align":"full","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|medium"}}}} -->
	<div class="wp-block-columns alignfull are-vertically-aligned-center is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"center","width":"75px"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75px"><!-- wp:image {"lightbox":{"enabled":false},"width":"75px","sizeSlug":"large","linkDestination":"custom"} -->
			<figure class="wp-block-image size-large is-resized"><a href="https://sayhello.ch/en/"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Say-Hello-small-usecase-svgomg.svg" alt="Say Hello Logo" class="" style="width:75px" /></a></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":""} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
			<p><em>I offer technical, training, programming and conceptual support for partner agencies and freelancers through my agency <a href="https://sayhello.ch/en/">Say Hello</a>: either on-site or via email, Slack or video call.</em> <em><a href="mailto:mark@sayhello.ch?subject=WordPress Training">Get in touch</a> if you'd like to discuss what options I provide.</em> <em>I am fluent in English, German and Swiss German, and my daily rate is means-adjusted for international work.</em></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->