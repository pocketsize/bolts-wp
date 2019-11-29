const BoltsElement = function(element) {
    if (element instanceof BoltsElement) {
        return element
    }

    let attributes = element.attributes || []

    attributes = Array.from(attributes)

    let properties = {
        element,
        selectAllBy(attribute, selector) {
            const elements = Array.from(
                this.element.querySelectorAll('[data-bolts-' + attribute + '="' + selector + '"]')
            )

            const boltsElements = []

            elements.forEach(function(element) {
                boltsElements.push(new BoltsElement(element))
            })

            return boltsElements
        },
        selectBy(attribute, selector) {
            const boltsElements = this.selectAllBy(attribute, selector)

            if (!boltsElements.length) {
                return false
            }

            return boltsElements[0]
        },
        selectAll(selector) {
            return this.selectAllBy('selector', selector)
        },
        select(selector) {
            const boltsElements = this.selectAll(selector)

            if (!boltsElements.length) {
                return false
            }

            return boltsElements[0]
        },
        closestBy(attribute, selector) {
            let element = this.element

            while (element.parentNode) {
                element = element.parentNode

                if (!element.tagName) {
                    break
                }

                if (element.getAttribute('data-bolts-' + attribute) == selector) {
                    return new BoltsElement(element)
                }

                if (
                    this.scope
                    && element.getAttribute('data-bolts-' + attribute) == this.scope
                ) {
                    return null
                }
            }

            return null
        },
        closest(selector) {
            return this.closestBy('selector', selector)
        },
        on(event, callback) {
            this.element.addEventListener(event, (e) => {
                callback.call(this, e)
            })
        }
    }

    attributes.forEach(function(attribute) {
        if (attribute.nodeName.indexOf('data-bolts-') === 0) {
            const key = attribute.nodeName.replace('data-bolts-', '').replace(/-([a-z])/g, function(g) {
                return g[1].toUpperCase()
            })

            const value = !!attribute.nodeValue ? attribute.nodeValue : true

            properties[key] = value
        }
    })

    Object.assign(this, properties)

    return this
}

const selectAllBy = function(attribute, selector) {
    const elements = Array.from(
        document.querySelectorAll(
            '[data-bolts-' + attribute + '="' + selector + '"]'
        )
    )

    const boltsElements = []

    elements.forEach(function(element) {
        boltsElements.push(new BoltsElement(element))
    })

    return boltsElements
}

const selectBy = function(attribute, selector) {
    const boltsElements = selectAllBy(attribute, selector)

    if (!boltsElements.length) {
        return false
    }

    return boltsElements[0]
}

const selectAll = function(selector) {
    if (selector instanceof HTMLCollection || selector instanceof NodeList || selector instanceof Array) {
        let elements = Array.from(selector),
            boltsElements = []

        elements.forEach((element) => {
            boltsElements.push(new BoltsElement(element))
        })

        return boltsElements
    }

    if (typeof selector == 'string') {
        return selectAllBy('selector', selector)
    }

    throw 'selectAll: selectAll accepts either a selector string, a HTMLCollection/NodeList, or an array of HTMLElements/BoltsElements'
}

const select = function(selector) {
    if (selector instanceof HTMLElement || selector instanceof BoltsElement) {
        return new BoltsElement(selector)
    }

    if (typeof selector == 'string') {
        const boltsElements = selectAll(selector)

        if (!boltsElements.length) {
            return false
        }

        return boltsElements[0]
    }

    throw 'select: select accepts either a selector string, or a HTMLElement/BoltsElement'
}

const selector = function() {
    let selector = '[data-bolts-'

    if (arguments.length == 1) {
        return selector + 'selector="' + arguments[0] + '"]'
    } else if (arguments.length == 2) {
        return selector + arguments[0] + '="' + arguments[1] + '"]'
    } else {
        throw 'selector: selector accepts either one or two arguments (parameter, selector or selector)'
    }
}

export { BoltsElement, selectBy, selectAllBy, selectAll, select, selector }