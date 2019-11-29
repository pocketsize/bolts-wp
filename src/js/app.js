/**
 * Bolts WP v1.0.0
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

import { bolts, state, misc, addDelegatedEventListener as on } from 'bolts-lib';
import { selector, selectBy, selectAllBy, selectAll, select } from './helpers/element';
import toggleState from './helpers/toggle-state';
import slider from './components/common/slider'

(() => {
    document.addEventListener('DOMContentLoaded', function() {
        /**
         * Initialize Bolts
         */

        bolts.init()

        /**
         * State toggles
         */

        const stateToggles = selectAllBy('action', 'toggle')

        toggleState.init(stateToggles)

        /**
         * Sliders
         */

        const sliderElements = selectAll('slider')

        sliderElements.forEach(function(sliderElement) {
            const sliderItemsElement = sliderElement.select('items').element

            slider.init({
                selector: sliderItemsElement,
                loop: true,
                duration: 1000,
                easing: 'cubic-bezier(.45, .08, .26, .99)',
            })
        })

        /**
         * Auto height
         */

        misc.autoHeight(selector('action', 'auto-height'))
    })
})()