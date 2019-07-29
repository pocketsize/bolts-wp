const BoltsElement = function(element) {
    let parameters = element.getAttribute('data-bolts-parameters')
        ? element
            .getAttribute('data-bolts-parameters')
            .replace(/\s\s+/g, ' ')
            .split(' ')
        : [];

    const elementObject = {
        element: element,
        selector: element.getAttribute('data-bolts-selector'),
        id: element.getAttribute('data-bolts-id'),
        action: element.getAttribute('data-bolts-action'),
        target: element.getAttribute('data-bolts-target'),
        value: element.getAttribute('data-bolts-value'),
        scope: element.getAttribute('data-bolts-scope'),
        parameters: parameters,
    };

    elementObject.selectBy = function(attribute, selector) {
        const selectedElement = this.element.querySelector(
            '[data-bolts-' + attribute + '="' + selector + '"]'
        );

        if (!selectedElement) {
            return false;
        }

        return new BoltsElement(selectedElement);
    };

    elementObject.select = function(selector) {
        return this.selectBy('selector', selector);
    };

    elementObject.selectAllBy = function(attribute, selector) {
        const elements = Array.from(
            this.element.querySelectorAll(
                '[data-bolts-' + attribute + '="' + selector + '"]'
            )
        );

        const boltsElements = [];

        elements.forEach(function(element) {
            boltsElements.push(new BoltsElement(element));
        });

        return boltsElements;
    };

    elementObject.selectAll = function(selector) {
        return this.selectAllBy('selector', selector);
    };

    elementObject.closest = function(selector) {
        let element = this.element;

        while (element.parentNode) {
            element = element.parentNode;

            if (!element.tagName) break;

            if (element.getAttribute('data-bolts-selector') == selector) {
                return new BoltsElement(element);
            }

            if (
                this.scope &&
                element.getAttribute('data-bolts-selector') == this.scope
            ) {
                return null;
            }
        }

        return null;
    };

    return elementObject;
};

const selectBy = function(attribute, selector) {
    const selectedElement = document.querySelector(
        '[data-bolts-' + attribute + '="' + selector + '"]'
    );

    if (!selectedElement) {
        return false;
    }

    return new BoltsElement(selectedElement);
};

const select = function(selector) {
    let element;

    if (typeof selector == 'string') {
        element = document.querySelector(
            '[data-bolts-selector="' + selector + '"]'
        );
    } else {
        element = selector;
    }

    if (!element) {
        return false;
    }

    return new BoltsElement(element);
};

const selectAllBy = function(attribute, selector) {
    const elements = Array.from(
        document.querySelectorAll(
            '[data-bolts-' + attribute + '="' + selector + '"]'
        )
    );

    const boltsElements = [];

    elements.forEach(function(element) {
        boltsElements.push(new BoltsElement(element));
    });

    return boltsElements;
};

const selectAll = function(selector) {
    let elements;

    if (typeof selector == 'string') {
        elements = document.querySelectorAll(
            '[data-bolts-selector="' + selector + '"]'
        );
    } else {
        elements = selector;
    }

    elements = Array.from(elements);

    const boltsElements = [];

    elements.forEach(function(element) {
        boltsElements.push(new BoltsElement(element));
    });

    return boltsElements;
};

export { BoltsElement, selectBy, select, selectAllBy, selectAll };
