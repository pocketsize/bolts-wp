// import 'babel-polyfill'
import Bolts from './bolts'
import BoltsWP from './bolts-wp'

(() => {

	Bolts.init();
	BoltsWP.init();

	// The world is your oyster...
	console.log('This is my WP project!');

})();