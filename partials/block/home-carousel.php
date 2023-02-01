<?php

if (empty($data ?? [])) {
	return;
}

if (empty($data['entries'] ?? [])) {
	if (pt_must_use_get_instance()->Package->Gutenberg->isContextEdit()) {
?>
		<section class="b-home-carousel b-home-carousel--noselection">
			<div class="c-editormessage c-editormessage--noselection">
				<p>
					<strong><?php _x('Home page carousel', 'Editor message title', 'sha'); ?></strong>
				</p>
				<p><?php _x('No entries available 😥', 'Editor message', 'sha'); ?></p>
			</div>
		</section>
	<?php }
} else {
	$extra_class = '';
	if (count($data['entries']) > 1) {
		$extra_class .= ' swiper-container--activateplease';
	}

	$image_size = 'large';

	?>
	<section class="c-block b-home-carousel alignfull">
		<div class="swiper-container<?php echo $extra_class; ?>">
			<div class="b-home-carousel__entries swiper-wrapper">
				<?php foreach ($data['entries'] as $entry) { ?>
					<article class="b-home-carousel__entry swiper-slide">
						<figure class="b-home-carousel__figure">
							<div class="b-home-carousel__imagewrap">
								<?php
								echo wp_get_attachment_image($entry['image']['ID'], $image_size);
								?>
							</div>
							<figcaption class="b-home-carousel__caption"><?php echo $entry['legend']; ?></figcaption>
							<?php
							if (!empty($entry['link']['url'])) { ?>
								<a class="b-home-carousel__link" href="<?php echo $entry['link']['url']; ?>"></a>
							<?php } ?>
						</figure>
					</article>
				<?php
				} ?>
			</div>
			<?php if (count($data['entries']) > 1) { ?>
				<div class="b-home-carousel__paginationwrap">
					<div class="b-home-carousel__pagination b-home-carousel__pagination--prev swiper-button-prev"></div>
					<div class="b-home-carousel__pagination b-home-carousel__pagination--next swiper-button-next"></div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php }
