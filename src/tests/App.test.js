import React from 'react';
import { shallow, mount } from 'enzyme';
import App from './App';

// smoke test - test if it render
test('it should render', () => {
	shallow(<App />);
});

// snapshot test - test the final HTML
test('it should render the expected HTML', () => {
	expect(
		mount(<App />).html()
	).toMatchSnapshot();
});

// unit test - test functionality
test('it should update the state and change the DOM after each click', () => {
	const wrapper = shallow(<App />);

	expect(
		wrapper.find('strong').text()
	).toBe('0');

	wrapper.find('div').simulate('click');

	expect(
		wrapper.find('strong').text()
	).toBe('1');
});