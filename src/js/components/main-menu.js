import { state } from 'bolts';

const mainMenu = {
	menuToggles: null,
	submenuToggles: null,

	cache() {
		this.menuToggles = Array.from(document.querySelectorAll('[data-menu-toggle]'));
		this.submenuToggles = Array.from(document.querySelectorAll('[data-submenu-toggle]'));
	},

	handleMainMenuToggle() {
		if (this.menuToggles.length) {
			this.menuToggles.forEach(toggle => {
				toggle.addEventListener('click', () => {
					state.toggle('menu-open');
				});
			});
		}
	},

	handleSubmenuToggle() {
		if (this.submenuToggles.length) {
			this.submenuToggles.forEach(toggle => {
				toggle.addEventListener('click', (e) => {
					const wrapper = e.target.parentNode.parentNode;
					wrapper.classList.toggle('is-open');
				});
			});
		}
	},

	init() {
		this.cache();
		this.handleMainMenuToggle();
		this.handleSubmenuToggle();
	}
}

export default mainMenu;
