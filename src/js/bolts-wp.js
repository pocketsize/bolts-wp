import Bolts from 'bolts'

const BoltsWP = () => {
	init() = function() {
		const htmlTag = document.querySelector('html');

		// Tell styles that JS is enabled
		htmlTag.classList.remove('no-js');

		// Tell styles if device supports touchevents
		if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
			htmlTag.classList.add('touchevents');
		} else {
			htmlTag.classList.add('no-touchevents');
		}
	}
};

export default BoltsWP;