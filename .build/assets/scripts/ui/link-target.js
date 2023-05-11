import { maybeSetLinkTarget } from '@sayhellogmbh/maybe-set-link-target';

const links = document.querySelectorAll('a');

if (links.length) {
	maybeSetLinkTarget(links);
}
