// import './modules/settings';
import './_polyfill';
import './a11y';
import './link-target';
import './masthead';
import './smooth-scroll';

const conditionalLoadScript = (filename, condition) => {
	if (!!condition) {
		const min = sht_theme.debug ? '' : '.min';
		let script = document.createElement('script');
		script.setAttribute('src', `${sht_theme.directory_uri}/assets/scripts/${filename}${min}.js?version=${sht_theme.version}`);
		document.head.appendChild(script);
	}
};

conditionalLoadScript('fancybox', true);
conditionalLoadScript('svh', !CSS.supports || !CSS.supports('height', '1svh'));
conditionalLoadScript('aria-toggler', !!document.querySelectorAll('[aria-controls]:not([data-standalone-controller])').length);
