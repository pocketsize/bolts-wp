/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import Bolts from 'bolts';
import { autoHeight } from 'bolts';
import mainMenu from './components/main-menu';

(() => {

	document.addEventListener('DOMContentLoaded', function() {

		Bolts.init();
		autoHeight('[data-auto-height]');
		mainMenu.init();
		
		// The world is your oyster!

	});

})();