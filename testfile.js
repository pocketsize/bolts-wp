const detectInstalled = require('detect-installed')

const fixedSetupFiles = []

// check if we should use preset-react
const react = detectInstalled.sync('react', {local: true})

if (react !== null) {
	fixedSetupFiles.push('<rootDir>/config/testing/enzyme.config.js')
}

console.log(react);
