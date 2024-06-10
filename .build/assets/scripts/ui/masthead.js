const masthead = document.querySelector('.c-masthead'),
	height = () => {
		document.documentElement.style.setProperty('--masthead--height', masthead.offsetHeight - 1 + 'px');
		window.anchorAnimateOffset = masthead.offsetHeight - 1;
		if (document.body.classList.contains('admin-bar')) {
			window.anchorAnimateOffset += document.querySelector('#wpadminbar').offsetHeight - 1;
		}
	};

if (masthead) {
	window.addEventListener('resize', height);
	window.addEventListener('orientationchange', height);
} else {
	document.documentElement.style.setProperty('--masthead--height', 0);
}
