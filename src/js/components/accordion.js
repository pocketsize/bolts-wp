/**
 * Accordion
 * 
 * Does the stuff. Uses Elemen.closest() so make
 * sure to polyfill that stuff if you want to 
 * support <Edge
 */

const accordion = {
	accordions: null,

	cache() {
		this.accordions = Array.from(document.querySelectorAll('[data-accordion]'));
	},

	toggleAccordion(accordionElem) {
		accordionElem.classList.toggle('is-open');
	},

	closeAllAccordions(accordionsWrapper) {
		const elems = Array.from(accordionsWrapper.querySelectorAll('[data-accordion-item]'));
		elems.forEach(elem => elem.classList.remove('is-open'));
	},

	handleWrapperOpenClass(accordionsWrapper) {
		const openItem = accordionsWrapper.querySelector('.is-open');

		if (openItem) {
			accordionsWrapper.classList.add('has-open-item');
		} else {
			accordionsWrapper.classList.remove('has-open-item');
		}
	},

	init() {
		this.cache();

		this.accordions.forEach(accordion => {
			accordion.addEventListener('click', (e) => {
				if (e.target.closest('[data-accordion-toggle]')) {
					const accordionItem = e.target.closest('[data-accordion-item]');

					if (!accordionItem.classList.contains('is-open')) {
						this.closeAllAccordions(accordion);
					}

					this.toggleAccordion(accordionItem);
					this.handleWrapperOpenClass(accordion);
				}
			});
		});
	}
}

export default accordion;