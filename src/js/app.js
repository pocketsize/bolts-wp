//import 'babel-polyfill'
import Bolts from 'bolts';

(() => {

	Bolts.init();

	document.addEventListener('DOMContentLoaded', function() {

		document.getElementsByClassName('toggle')[0].addEventListener('click', function() {
			Bolts.toggle('menu');
		});

	});

})();