import BabelPolyfill from 'babel-polyfill'
import FastClick from 'fastclick'
//import 'bolts/js/bolts'

console.log('uftn', Date.now());


(function () {
	if (!window.jQuery) return false;

	jQuery(function ($) {

		// Tell styles that JS is enabled
		$('html').removeClass('no-js');

		// Remove 300ms touch event delay (depends on FastClick)
		if (!!window.FastClick) {
			$('input, textarea, select, button').addClass('needsclick');
			FastClick.attach(document.body);
		}

	});

})();