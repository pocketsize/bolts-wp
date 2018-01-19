//import 'babel-polyfill'
import Bolts from 'bolts';
import BoltsWP from './bolts-wp'

(() => {

	Bolts.init();
	BoltsWP.init();

	document.addEventListener('DOMContentLoaded', function() {

		document.getElementsByClassName('toggle')[0].addEventListener('click', function() {
			Bolts.toggle('menu');
		});

	});

})();