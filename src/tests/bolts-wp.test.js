// Import assertion with "should" syntax from chai and init it
import { should } from 'chai'
should()

// Import the module to test
import BoltsWP from '../js/bolts-wp'

// Define all tests on the module
describe('BoltsWP', function () {
	it('Should be an object', function () {
		BoltsWP.should.be.an('object')
	})

	it('Should have "init" method', function () {
		BoltsWP.init.should.not.be.undefined
	})
})