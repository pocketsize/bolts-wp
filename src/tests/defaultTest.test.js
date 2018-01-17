// Import assertion with "should" syntax from chai and init it
import { should } from 'chai'
should()

// Import the module to test
import { test } from '../js/defaultTest'

// Define all tests on the module
describe('Test if testing works', () => {
    it('True should be true', () => {
        test().should.be.true
    })

    it('True should not be false', () => {
        test().should.not.be.false
    })
})