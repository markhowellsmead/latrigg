<?php
/**
 * Title: main-query-loop
 * Slug: latrigg/main-query-loop
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:query {"queryId":0,"query":{"perPage":"5","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"displayLayout":{"type":"flex","columns":3},"layout":{"inherit":true,"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-query"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"className":"c-archive__header"} -->
<div class="wp-block-group c-archive__header"><!-- wp:query-title {"type":"archive","textAlign":"center"} /-->

<!-- wp:term-description {"textAlign":"center"} /--></div>
<!-- /wp:group -->

<!-- wp:post-template {"align":"wide"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|regular"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:sht/primary-media {"hideInlineEmbed":true,"className":"is-style-3x2"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xsmall"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"typography":{"fontWeight":"600"}},"fontSize":"medium"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"post-meta","layout":{"type":"default"},"fontSize":"small"} -->
<div class="wp-block-group post-meta has-small-font-size"><!-- wp:post-date /-->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"Read more","fontSize":"smaller"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results {"align":"wide"} -->
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center"><strong>Sorry, but there aren't any entries for this selection at the moment.</strong><br>If you'd like me to add some, then feel free to <a href="mailto:mark@permanenttourist.local">get in touch</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">(Here's a pretty picture, so that you don't feel disappointed.)</p>
<!-- /wp:paragraph -->

<!-- wp:image {"align":"wide","id":72611,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image alignwide size-large"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/20230528-DSCF2758-edited-1280x720.webp" alt="<?php echo esc_attr_e( 'Poppies in north-western Switzerland', 'Latrigg' ); ?>" class="wp-image-72611"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->