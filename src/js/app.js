/**
 * Bolts WP v1.0.0
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import { bolts, misc } from 'bolts-lib';
import toggleState from './helpers/toggle-state';
import { selector, select, selectAll, selectAllBy } from './helpers/element';
import slider from './components/common/slider';

(() => {
    document.addEventListener('DOMContentLoaded', function() {
        /**
         * Initialize Bolts
         */

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

        misc.autoHeight(selector('action', 'auto-height'));
    });
})();