/**
 * Bolts WP v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import '@babel/polyfill';
import { bolts, misc } from 'bolts-lib';
import toggleState from './helpers/toggle-state';
import { select, selectAll, selectAllBy } from './helpers/element';
//import slider from './components/common/slider';
//import image from './components/common/image';
//import choices from './external/choices.js';
//import tabs from './components/common/tabs';

(() => {
    document.addEventListener('DOMContentLoaded', function() {
        bolts.init();

        /**
         * State toggles
         */

        const stateToggles = selectAllBy('action', 'toggle');

        toggleState.init(stateToggles);

        /**
         * Sliders
         */

        const sliderElements = selectAll('slider');

        sliderElements.forEach(function(sliderElement) {
            const sliderItemsElement = sliderElement.select('items').element;

            slider.init({
                selector: sliderItemsElement,
                loop: true,
                duration: 1000,
                easing: 'cubic-bezier(.45, .08, .26, .99)',
            });
        });

        /**
         * Auto height
         */

        misc.autoHeight('[data-bolts-action="auto-height"]');

        // The world is your oyster!
    });
})();
