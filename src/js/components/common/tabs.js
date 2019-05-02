import { misc } from 'bolts-lib';

const tabs = {
    tabs: null,

    cache() {
        this.tabs = Array.from(document.querySelectorAll('[data-bolts-tabs]'));
    },

    toggleActiveClass(element, isActive) {
        const operator = isActive ? 'add' : 'remove';

        element.classList[operator]('is-active');
    },

    updateContentWrappers(tabs, targetIdentifier) {
        const contentWrappers = Array.from(
            tabs.querySelectorAll('[data-bolts-tab-content]')
        );

        contentWrappers.forEach(container => {
            const containerIdentifier = container.getAttribute(
                'data-bolts-tab-content'
            );

            const activeCheck = containerIdentifier === targetIdentifier;

            this.toggleActiveClass(container, activeCheck);
        });
    },

    updateToggles(toggles, targetToggle) {
        toggles.forEach(toggle => {
            const activeCheck = toggle === targetToggle;
            this.toggleActiveClass(toggle, activeCheck);
        });
    },

    init() {
        this.cache();

        if (this.tabs != null && this.tabs.length) {
            this.tabs.forEach(component => {
                const toggles = Array.from(
                    component.querySelectorAll('[data-bolts-tab-to]')
                );
                const tabContainer = component.querySelector(
                    '[data-bolts-tab-container]'
                );

                // init max height of component
                tabContainer.style.maxHeight = tabContainer.scrollHeight + 'px';

                toggles.forEach(toggle => {
                    toggle.addEventListener('click', () => {
                        const identifier = toggle.getAttribute(
                            'data-bolts-tab-to'
                        );
                        const height = tabContainer.style.height;

                        tabContainer.style.height = '';
                        this.updateContentWrappers(component, identifier);
                        const newHeight = tabContainer.scrollHeight + 'px';

                        tabContainer.style.maxHeight = height;
                        tabContainer.style.height = '13337px'; // A bit haxxxy but the only way I could make this work is by animating the max-height
                        tabContainer.style.maxHeight = newHeight;

                        this.updateToggles(toggles, toggle);
                    });
                });
            });
        }
    },
};

export default tabs;
