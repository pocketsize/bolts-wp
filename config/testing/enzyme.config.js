/**
 * Config for Enzyme 
 * Used by [./jest.config.js] if React is installed
 * 
 * Enzyme docs can be found here:
 * https://airbnb.io/enzyme/
 */

import { configure } from 'enzyme';
import Adapter from 'enzyme-adapter-react-16';

configure({ adapter: new Adapter() });