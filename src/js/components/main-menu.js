import { state } from 'bolts-lib';

const mainMenu = {
    menuToggles: null,
    submenuToggles: null,

    cache() {
        this.menuToggles = Array.from(
            document.querySelectorAll('[data-menu-toggle]')
        );
        this.submenuToggles = Array.from(
            document.querySelectorAll('[data-submenu-toggle]')
        );
    },

    handleMainMenuToggle() {
        if (this.menuToggles.length) {
            this.menuToggles.forEach(toggle => {
                toggle.addEventListener('click', () => {
                    if (state.get('menu')) {
                        state.set('menu', false);
                    } else {
                        state.set('menu');
                    }
                });
            });
        }
    },

    handleSubmenuToggle() {
        if (this.submenuToggles.length) {
            this.submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', e => {
                    const wrapper = e.target.parentNode;

                    let stateValue = !state.get('open', wrapper);

                    state.set('open', stateValue, wrapper);
                });
            });
        }
    },

    init() {
        this.cache();
        this.handleMainMenuToggle();
        this.handleSubmenuToggle();
    },
};

export default mainMenu;
