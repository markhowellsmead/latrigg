/**
 * Thanks to the lack in responsive controls for WordPress Core,
 * this script is a workaround to make sure that the Cover block
 * doesn't squash the content if the min-height is set in viewport units.
 *
 * mark@sayhello.ch 21.3.2025
 */

const blocks = document.querySelectorAll('.wp-block-cover[style*="min-height"]');

if (blocks.length) {
	blocks.forEach((block) => {
		const minHeight = block.style.minHeight;
		if (minHeight && (minHeight?.indexOf('vh') !== -1 || minHeight?.indexOf('svh') !== -1)) {
			block.dataset.minHeightWas = minHeight;
		}
	});

	const doResize = () => {
		blocks.forEach((block) => {
			if (
				block.dataset.minHeightWas &&
				(block.dataset.minHeightWas.indexOf('vh') !== -1 || block.dataset.minHeightWas.indexOf('svh') !== -1)
			) {
				if (window.innerHeight < 650) {
					block.style.minHeight = '460px';
				} else {
					block.style.minHeight = block.dataset.minHeightWas;
				}
			}
		});
	};

	doResize();
	window.addEventListener('resize', doResize);
}
