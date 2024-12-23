/**
 * This script handles any interaction between any number of Controllers (e.g. buttons)
 * which have an aria-controls attribute, and the Target elements to they refer.
 *
 * It uses aria attributes instead of CSS class names in order to provide maximum
 * accessibility support.
 *
 * A single Target can be manipulated using multiple Controllers. (More than one button
 * on the page to hide/show a Target.) In this case, the aria-expanded value on ALL of
 * the ControllerS relating to that Target will be updated when the Target is hidden or
 * shown by one of the Controllers.
 *
 * If the TARGET has an HTML attribute data-root-style, then the value of this attribute
 * will be added to the document root (<html>) when the Target is visible, and removed when
 * the Target is hidden.
 *
 * Visibility and state of the Controller and the Target takes place
 * by switching the values of aria-hidden (on the Target) and aria-expanded
 * (on the Controller).
 *
 * Use e.g. .c-nav--mobile[aria-hidden="true"] in CSS to hide/show/transform
 * the element; not a CSS state class.
 *
 * Basic usage:
 *
 <button aria-controls="mobile-menu" aria-expanded="false">Show navigation</button>
 <nav id="mobile-menu" aria-hidden="true" data-root-style="is--mobilemenu"> … Content of the navigation … </nav>
 *
 * Or
 *
 <button aria-controls="my-overlay" aria-expanded="false">Button 1</button>
 <button aria-controls="my-overlay" aria-expanded="false">Button 2</button>
 <div id="my-overlay" aria-hidden="true"> … Content of the overlay … </nav>
 *
 *
 * This version mark@sayhello.ch 21.09.2021
 *
 */

const controllers = document.querySelectorAll('[aria-controls]:not([data-standalone-controller])');

if (!!controllers) {
	var clickHandler = (event) => {
		const controller = event.currentTarget;

		let target = document.querySelector('#' + controller.getAttribute('aria-controls'));

		if (!target) {
			console.error(`Target #${controller.getAttribute('aria-controls')} not found`);
			return;
		}

		// Close all referenced elements before opening the new target
		if (!!target.dataset.closeAll && target.dataset.closeAll !== '') {
			const toClose = document.querySelectorAll(target.dataset.closeAll);
			if (!!toClose) {
				toClose.forEach((element) => {
					element.setAttribute('aria-hidden', 'true');
					document.querySelectorAll(`[aria-controls="${element.id}"]`).forEach((controller) => {
						controller.setAttribute('aria-expanded', 'false');
					});
				});
			}
		}

		if (!!controller.dataset.close) {
			target.setAttribute('aria-hidden', 'true');
		} else if (!!controller.dataset.open) {
			target.setAttribute('aria-hidden', 'false');
		} else {
			target.setAttribute('aria-hidden', controller.getAttribute('aria-expanded') == 'false' ? 'false' : 'true');
		}

		document.querySelectorAll(`[aria-controls="${target.id}"]`).forEach((controller) => {
			controller.setAttribute('aria-expanded', target.getAttribute('aria-hidden') === 'true' ? 'false' : 'true');
		});

		// Focus the first form field in the target if there is one
		// if (
		// 	target.getAttribute('aria-hidden') === 'false' &&
		// 	target.querySelectorAll('input,textarea').length
		// ) {
		// 	let field_focused = false,
		// 		fields = target.querySelectorAll('input,textarea');

		// 	if (!!fields.length) {
		// 		fields.forEach((field) => {
		// 			if (field_focused) {
		// 				return;
		// 			}
		// 			let style = window.getComputedStyle(field);
		// 			if (
		// 				!(
		// 					style.display === 'none' ||
		// 					style.visibility === 'hidden'
		// 				)
		// 			) {
		// 				target.querySelector('input').focus();
		// 				field_focused = true;
		// 			}
		// 		});
		// 	}
		// }

		if (!!target.dataset.toggleStyle && target.dataset.toggleStyle !== '') {
			if (target.getAttribute('aria-hidden') === 'false') {
				target.classList.add(target.dataset.toggleStyle);
			} else {
				target.classList.remove(target.dataset.toggleStyle);
			}
		}

		if (!!target.dataset.rootStyle && target.dataset.rootStyle !== '') {
			target.dataset.rootStyle.split(' ').forEach((style) => {
				if (target.getAttribute('aria-hidden') === 'false') {
					document.documentElement.classList.add(style);
				} else {
					document.documentElement.classList.remove(style);
				}
			});
		}

		if (!!controller.getAttribute('data-blurme')) {
			controller.blur();
		}
	};

	controllers.forEach((controller) => {
		if (controller.getAttribute('id') === controller.getAttribute('aria-controls')) {
			controller.removeAttribute('id');
		}

		controller.addEventListener('click', clickHandler);
	});

	if (!!document.querySelector('#mobilemenu')) {
		document.querySelector('#mobilemenu').dataset.rootStyle = 'is--mobilemenu--open';
		document.querySelector('#mobilemenu').setAttribute('data-hidden', 'true');
	}
}
