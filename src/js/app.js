/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import '@babel/polyfill';
import { bolts, misc } from 'bolts-lib';
import mainMenu from './components/main-menu';
import toggleState from './misc/toggle-state';
//import slider from './components/common/slider';
//import image from './components/common/image';
//import choices from './external/choices.js';
import tabs from './components/common/tabs';

(() => {
    document.addEventListener('DOMContentLoaded', function() {
        Bolts.init();
        misc.autoHeight('[data-auto-height]');
        mainMenu.init();
        toggleState.init();
        //slider.init();
        //images.init();
        //choices.init();
        //tabs.init();

        // The world is your oyster!
    });
})();
