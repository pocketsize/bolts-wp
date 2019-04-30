/**
 * Toggle State
 *
 * Attaches event listeners to all [data-toggle]-attributes
 * and toggles their values to/from the global Bolts state.
 *
 * Useful for menus, modals or anything else you want to style
 * on a state.
 */

import { state } from 'bolts-lib';

const toggleState = {
    toggles: null,

    cache() {
        this.toggles = Array.from(document.querySelectorAll('[data-toggle]'));
    },

    init() {
        this.cache();

        if (this.toggles.length) {
            this.toggles.forEach(toggle => {
                toggle.addEventListener('click', e => {
                    e.preventDefault();
                    const value = toggle.getAttribute('data-toggle');
                    state.toggle(value);
                });
            });
        }
    },
};

export default toggleState;
