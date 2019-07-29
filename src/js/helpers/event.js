const eventListeners = {};

const on = function(type, selector, callback) {
    if (!eventListeners[type]) {
        const listeners = (eventListeners[type] = []);

        document.addEventListener(type, function(event) {
            for (
                let element = event.target;
                element && element.parentNode;
                element = element.parentNode
            ) {
                for (const { selector, callback } of listeners) {
                    if (element.matches(selector)) {
                        callback.call(element, event);
                    }
                }

                if (event.cancelBubble) {
                    break;
                }
            }
        });
    }

    eventListeners[type].push({ selector, callback });
};

export { on };
