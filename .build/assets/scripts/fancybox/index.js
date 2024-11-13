import { Fancybox } from '@fancyapps/ui';
import '@fancyapps/ui/dist/fancybox/fancybox.css';

// Override default behaviour
Fancybox.defaults.infinite = 0;

document.querySelectorAll('a[target="_self"]').forEach((link) => {
	const url = new URL(link.href) || false;
	if (url instanceof URL) {
		// preg_match url.pathname for file extension jpg, png, jpeg, gif, svg, webp
		const regex = /\.(jpg|jpeg|png|gif|svg|webp|avif)$/;
		if (regex.test(url.pathname)) {
			link.removeAttribute('target');
		}
	}
});

const suffixes = ['.jpg', '.jpeg', '.png', '.gif', '.svg', '.webp', '.avif'],
	selector = suffixes.map((suffix) => `a[href$='${suffix}']:not([target]):not([download])`).join(', ');

const options = {
	groupAll: true,
	wheel: false,
	Images: {
		zoom: false,
	},
};

Fancybox.bind(selector, options);
