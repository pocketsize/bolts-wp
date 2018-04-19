/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import 'babel-polyfill'
import Bolts from 'bolts';

(() => {

	document.addEventListener('DOMContentLoaded', function() {

		Bolts.init();

		document.getElementsByClassName('toggle')[0].addEventListener('click', function() {
			Bolts.toggle('menu');
		});

	});

	// The world is your oyster!

})();