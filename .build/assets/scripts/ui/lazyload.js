document.querySelectorAll('[loading="lazy"]').forEach((element) => {
	const animateIn = () => {
		element.classList.add('is--loaded');
	};

	if (element.complete) {
		animateIn();
	} else {
		element.addEventListener('load', animateIn);
	}
});
