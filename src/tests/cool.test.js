function sum(x, y) {
	return x + y;
}

test('If testing works', () => {
	expect(sum(1, 2)).toBe(3);
});