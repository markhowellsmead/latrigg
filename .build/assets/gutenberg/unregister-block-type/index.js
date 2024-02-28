/**
 * Disable specific blocks within the Gutenberg Editor
 * Runs a check against all currently registered blocks
 * to ensure that a JavaScript error isn't provoked by
 * trying to unregister a block which isn't registered.
 *
 * mark@sayhello.ch 18.11.2020
 */

import { getBlockTypes, unregisterBlockType } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

domReady('load', () => {
	let activeBlocks = [];

	getBlockTypes().forEach(function (blockType) {
		activeBlocks.push(blockType.name);
	});

	['core-embed/instagram'].forEach((block) => {
		if (activeBlocks.includes(block)) {
			unregisterBlockType(block);
		}
	});
});
