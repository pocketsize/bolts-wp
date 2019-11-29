import { state, addDelegatedEventListener as on } from 'bolts-lib'
import { selector, select } from './element'

const toggleState = {
    init: function() {
        on('click', selector('action', 'toggle'), function(e) {
            let currentToggle = select(this);
            let root;

            // If current toggle has a scope, attempt to set root to the closest element matching the scope selector
            if (currentToggle.scope) {
                root = currentToggle.closest(currentToggle.scope)
            }

            // Set root to html if not set
            if (!root) {
                root = select(document.documentElement)
            }

            // set targetElement to false (global scope)
            let targetElement = false

            // If current toggle has a target
            if (currentToggle.target) {
                // and "closest" parameter, set targetElement to closest element matching the target selector
                if (currentToggle.parameterClosest) {
                    targetElement = currentToggle.closest(currentToggle.target)
                }

                // and "index" parameter, set targetElement to element matching the toggle index (in same scope) and target selector
                if (currentToggle.parameterIndex) {
                    let allToggles = root.selectAll(currentToggle.selector)

                    allToggles.forEach(function(oneToggle) {
                        if (oneToggle.element === currentToggle.element) {
                            targetElement = root.selectAll(
                                currentToggle.target
                            )[allToggles.indexOf(oneToggle)]
                        }
                    })
                }

                // Set target element to first element matching the target selector in current scope
                if (!targetElement) {
                    targetElement = root.select(currentToggle.target)
                }
            }

            // If targetElement is set, set targetElement to DOM element
            targetElement = targetElement ? targetElement.element : false

            // Determine if we should toggle or set the state value
            let method = currentToggle.parameterSet ? 'set' : 'toggle'

            let toggleValues = currentToggle.value ? [currentToggle.value, false] : [true, false]

            // If current toggle has "unique" parameter
            if (currentToggle.parameterUnique) {
                let items = root.selectAll(currentToggle.target)

                // If current toggle has "self" parameter, add all toggles to items to remove states from
                if (currentToggle.parameterSelf) {
                    let allToggles = root.selectAll(currentToggle.selector)

                    items = items.concat(allToggles)
                }

                // Unset state on all elements matching target selector
                items.forEach(function(item) {
                    state.set(currentToggle.name, false, item.element)
                })

                state.set(currentToggle.name, toggleValues[0], targetElement)
            } else {
                // Toggle/set state
                state[method](currentToggle.name, method == 'set' ? toggleValues[0] : toggleValues, targetElement)
            }

            // If current toggle has "self" parameter, toggle/set state on itself as well
            if (currentToggle.parameterSelf) {
                state[method](currentToggle.name, method == 'set' ? toggleValues[0] : toggleValues, currentToggle.element)
            }
        })
    },
}

export default toggleState