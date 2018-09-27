/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import 'babel-polyfill';
import Bolts from 'bolts';

(() => {

	document.addEventListener('DOMContentLoaded', function() {

		Bolts.init();

		const toggles = document.querySelectorAll('[data-toggle]');

		if ( toggles.length ) {
			Array.prototype.forEach.call(toggles, function(toggle) {
				toggle.addEventListener('click', function() {
					Bolts.state.toggle( this.getAttribute('data-toggle'), [true, false] );
				});
			});
		}

		// The world is your oyster!

	});

})();