/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import Bolts from 'bolts';
import { autoHeight } from 'bolts';
import mainMenu from './components/main-menu';
import toggleState from './misc/toggle-state';

(() => {

	document.addEventListener('DOMContentLoaded', function() {

		Bolts.init();
		autoHeight('[data-auto-height]');
		mainMenu.init();
		toggleState.init();
		
		// The world is your oyster!

	});

})();