const on = function(type, selector, callback) {
    if (!on.eventListeners[type]) {
        const listeners = (on.eventListeners[type] = []);

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

    on.eventListeners[type].push({ selector, callback });
};

on.eventListeners = {};

export { on };
