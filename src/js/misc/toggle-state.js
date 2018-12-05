import { state } from 'bolts';

const toggleState = {
	toggles: null,

	cache() {
		this.toggles = Array.from(document.querySelectorAll('[data-toggle]'));
	},

	init() {
		this.cache();

		if (this.toggles.length) {
			this.toggles.forEach(toggle => {
				toggle.addEventListener('click', (e) => {
					e.preventDefault();
					const value = toggle.getAttribute('data-toggle');
					state.toggle(value);
				});
			})
		}
	}
}

export default toggleState;