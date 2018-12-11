const config = require('../editable.config')
const isCoverage = !!(process.env.NODE_ENV === 'cover')

module.exports = {
	output: {
		devtoolModuleFilenameTemplate: '[absolute-resource-path]',
		devtoolFallbackModuleFilenameTemplate: '[absolute-resource-path]?[hash]'
	},
	module: {
		loaders: [].concat(
			isCoverage ? {
				test: /.js$/,
				include: config.paths.javascript,
				loader: 'istanbul-instrumenter-loader'
			} : [],
			{
				test: /.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader'
			}
		),
	},
	target: 'node',
	externals: config.paths.externals,
	devtool: 'inline-cheap-module-source-map'
}