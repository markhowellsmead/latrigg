import { Fancybox } from '@fancyapps/ui';
import '@fancyapps/ui/src/Fancybox/Fancybox.scss';

// Override default behaviour
Fancybox.defaults.infinite = 0;

document.querySelectorAll('a[target="_self"]:not([download])').forEach((link) => {
	const url = new URL(link.href) || false;
	if (url instanceof URL) {
		// preg_match url.pathname for file extension jpg, png, jpeg, gif, svg, webp
		const regex = /\.(jpg|jpeg|png|gif|svg|webp)$/;
		if (regex.test(url.pathname)) {
			link.removeAttribute('target');
		}
	}
});

Fancybox.bind(
	"a[href$='.jpg']:not([target]):not([download]), a[href$='.jpeg']:not([target]):not([download]), a[href$='.png']:not([target]):not([download]), a[href$='.gif']:not([target]):not([download]), a[href$='.svg']:not([target]):not([download]), a[href$='.webp']:not([target]):not([download])",
	{
		groupAll: true,
	}
);
