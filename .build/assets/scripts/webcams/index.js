const images = document.querySelectorAll('.wp-block-image.is-style-webcam img');

if (images.length) {
	// add query parameter force, with a random number value
	const force = Math.floor(Math.random() * 1000000000);
	images.forEach((image) => {
		image.src = image.src + '?force=' + force;
	});
}
