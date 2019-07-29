import { state } from 'bolts-lib';
import { select, selectAll } from './element';

const toggleState = {
    init: function(stateToggles) {
        if (typeof stateToggles == 'undefined') {
            throw new Error('No argument supplied to toggleState');
        }

        // Attach click handler on every element with the toggle action
        stateToggles.forEach(function(stateToggle) {
            stateToggle.element.addEventListener('click', function(e) {
                let currentToggle = select(this);
                let root;

                // If current toggle has a scope, attempt to set root to the closest element matching the scope selector
                if (currentToggle.scope) {
                    root = currentToggle.closest(currentToggle.scope);
                }

                // Set root to html if not set
                if (!root) {
                    root = select(document.querySelector('html'));
                }

                // set targetElement to false (global scope)
                let targetElement = false;

                // If current toggle has a target
                if (currentToggle.target) {
                    // and "closest" parameter, set targetElement to closest element matching the target selector
                    if (currentToggle.parameters.indexOf('closest') != -1) {
                        targetElement = currentToggle.closest(
                            currentToggle.target
                        );
                    }

                    // and "index" parameter, set targetElement to element matching the toggle index (in same scope) and target selector
                    if (currentToggle.parameters.indexOf('index') != -1) {
                        let allToggles = root.selectAll(currentToggle.selector);

                        allToggles.forEach(function(oneToggle) {
                            if (oneToggle.element === currentToggle.element) {
                                targetElement = root.selectAll(
                                    currentToggle.target
                                )[allToggles.indexOf(oneToggle)];
                            }
                        });
                    }

                    // Set target element to first element matching the target selector in current scope
                    if (!targetElement) {
                        targetElement = root.select(currentToggle.target);
                    }
                }

                // If targetElement is set, set targetElement to DOM element
                targetElement = targetElement ? targetElement.element : false;

                // Determine if current toggle has state
                let hasState = state.get(currentToggle.value, targetElement);

                // If "set" parameter, prevent toggling (temporary)
                if (currentToggle.parameters.indexOf('set') != -1) {
                    hasState = false;
                }

                // If current toggle has and "unique" parameters
                if (currentToggle.parameters.indexOf('unique') != -1) {
                    let items = root.selectAll(currentToggle.target);

                    // If current toggle has "self" parameter, add all toggles to items to remove states from
                    if (currentToggle.parameters.indexOf('self') != -1) {
                        let allToggles = root.selectAll(currentToggle.selector);

                        items = items.concat(allToggles);
                    }

                    // remove state from all elements matching target selector
                    items.forEach(function(item) {
                        state.set(currentToggle.value, false, item.element);
                    });

                    if (!hasState) {
                        state.set(
                            currentToggle.value,
                            !hasState,
                            targetElement
                        );
                    }
                } else {
                    // In all other cases, toggle the state
                    state.set(currentToggle.value, !hasState, targetElement);
                }

                // If current toggle has "self" parameter, toggle state on itself as well
                if (currentToggle.parameters.indexOf('self') != -1) {
                    state.set(
                        currentToggle.value,
                        !hasState,
                        currentToggle.element
                    );
                }
            });
        });
    },
};

export default toggleState;
