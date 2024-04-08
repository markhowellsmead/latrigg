import domReady from '@wordpress/dom-ready';
import { registerBlockStyle, unregisterBlockStyle } from '@wordpress/blocks';

domReady(() => {
	registerBlockStyle('core/button', {
		name: 'with-arrow-right',
		label: 'Arrow right',
	});

	registerBlockStyle('core/button', {
		name: 'with-arrow-down',
		label: 'Arrow down',
	});
});
