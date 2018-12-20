/**
 * Babel config
 *
 * Put all your config here. We have included some dumb logic
 * that determines if we want to load React stuff (used with the bolts-add:react script)
 */

const detectInstalled = require('detect-installed');

// Put all your presets here
const fixedPresets = ['@babel/preset-env'];

// check if we should use preset-react
const react = detectInstalled.sync('react', { local: true });

if (react) {
    fixedPresets.push('@babel/preset-react');
}

// Export config
module.exports = {
    presets: fixedPresets,
};
