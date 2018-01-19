import 'babel-polyfill'
import Bolts from 'bolts';

(() => {

	document.addEventListener('DOMContentLoaded', function() {

		Bolts.init();

		document.getElementsByClassName('toggle')[0].addEventListener('click', function() {
			Bolts.toggle('menu');
		});

	});

	// The world is your oyster!

})();