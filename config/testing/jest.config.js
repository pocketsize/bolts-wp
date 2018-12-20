/**
 * Jest config
 *
 * Put all your config here. We have included some dumb logic
 * that determines if we want to load React stuff (used with the bolts-add:react script).
 *
 * Read more about Jest config here:
 * https://jestjs.io/docs/en/configuration.html
 */

require('dotenv').config();
const detectInstalled = require('detect-installed');

// Put all your presets here
const fixedSetupFiles = [];

// check if we should use preset-react
const react = detectInstalled.sync('react', { local: true });

if (react) {
    fixedSetupFiles.push('<rootDir>/config/testing/enzyme.config.js');
}

// Export config
module.exports = {
    // Set the root directory
    rootDir: '../../',

    // Automatically clear mock calls and instances between every test
    clearMocks: true,

    // An array of glob patterns indicating a set of files for which coverage information should be collected
    collectCoverageFrom: ['<rootDir>/src/js/**/*.{js,jsx,mjs}'],

    // The directory where Jest should output its coverage files
    coverageDirectory: 'coverage',

    // An array of file extensions your modules use
    moduleFileExtensions: ['js', 'json', 'jsx'],

    // The paths to modules that run some code to configure or set up the testing environment before each test
    setupFiles: fixedSetupFiles,

    // The test environment that will be used for testing
    testEnvironment: 'jsdom',

    // The glob patterns Jest uses to detect test files
    testMatch: ['**/__tests__/**/*.js?(x)', '**/?(*.)+(spec|test).js?(x)'],

    // An array of regexp pattern strings that are matched against all test paths, matched tests are skipped
    testPathIgnorePatterns: ['\\\\node_modules\\\\'],

    // This option sets the URL for the jsdom environment. It is reflected in properties such as location.href
    testURL: process.env.WP_HOME,

    // An array of regexp pattern strings that are matched against all source file paths, matched files will skip transformation
    transformIgnorePatterns: ['../../node_modules/'],

    transform: {
        '^.+\\.jsx$': 'babel-jest',
        '^.+\\.js$': 'babel-jest',
    },

    // Indicates whether each individual test should be reported during the run
    verbose: false,
};
