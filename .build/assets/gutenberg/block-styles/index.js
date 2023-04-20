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

window.addEventListener('load', () => {
	unregisterBlockStyle('core/image', 'default');
	unregisterBlockStyle('core/image', 'rounded');
	unregisterBlockStyle('core/separator', 'wide');
});
