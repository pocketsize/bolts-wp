// !!! DONT EDIT THIS FILE !!!
// Changes to the Webpack settings are better done in [./editable.config.js].
// Only edit this file if you REEEEALY want to get freaky with the config.

const webpack = require('webpack')
const path = require('path')
const CopyWebpackPlugin = require('copy-webpack-plugin')
const CleanWebpackPlugin = require('clean-webpack-plugin')
const StyleLintPlugin = require('stylelint-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const ImageminPlugin = require('imagemin-webpack-plugin').default
const ImageminMozjpeg = require('imagemin-mozjpeg')

const moduleRules = require('./module.rules')
const config = require('./editable.config')

const isDev = !!(process.env.NODE_ENV === 'dev')
const isProd = !!(process.env.NODE_ENV === 'prod')
const doServe = !!(process.env.SERVE === 'true')

module.exports = {
	// Check if sourcemaps are needed.
	devtool: (isDev && config.settings.sourceMaps) ? 'source-map' : undefined,

	// Entry points.
	entry: config.entrypoints,

	// JS output name and destination.
	output: {
		path: config.paths.public,
		filename: config.outputs.javascript.filename
	},

	// External dependencies.
	externals: config.externals,

	// Custom resolutions.
	resolve: config.resolve,

	// Make build faster.
	performance: {
		hints: false
	},

	// Rules for handling filetypes.
	module: {
		rules: [
			moduleRules.javascript,
			moduleRules.sass,
			moduleRules.fonts,
			moduleRules.images,
		]
	},

	// Plugins runnung in every build in every build.
	plugins: [
		new webpack.LoaderOptionsPlugin({ minimize: isProd }),
		new ExtractTextPlugin(config.outputs.css),
		new CleanWebpackPlugin(config.paths.public, { root: config.paths.root }),
		new CopyWebpackPlugin([{
			context: config.paths.images,
			from: {
				glob: `${config.paths.images}/**/*`,
				flatten: true,
				dot: false
			},
			to: config.outputs.image.filename,
		}]),
		new CopyWebpackPlugin([{
			context: config.paths.fonts,
			from: {
				glob: `${config.paths.fonts}/**/*`,
				flatten: false,
				dot: false
			},
			to: config.outputs.font.filename,
		}]),
	]
}

// StyleLint if settings are specified.
if (config.settings.styleLint) {
	module.exports.plugins.push(
		new StyleLintPlugin(config.settings.styleLint)
	)
}

// Set BrowserSync settings if serving
if (doServe) {
	// setting our default settings...
	const browserSyncSettings = {
		host: 'localhost',
		port: 3000,
		proxy: 'http://localhost:8080',
		files: [
			{
				match: ['../**/*.php'],
				fn: function (event, file) {
					if (event === 'change') {
						this.reload()
					}
				}
			}
		]
	}

	// ...and overwriting them with user settings
	Object.assign(browserSyncSettings, config.settings.browserSync)

	module.exports.plugins.push(
		new BrowserSyncPlugin(browserSyncSettings)
	)
}

// Optimize if prod
if (isProd) {
	module.exports.plugins.push(
		new webpack.optimize.UglifyJsPlugin({
			comments: false,
			compress: { warnings: false },
			sourceMap: false
		})
	)

	module.exports.plugins.push(
		new ImageminPlugin({
			test: /\.(jpe?g|png|gif|svg)$/i,
			optipng: { optimizationLevel: 7 },
			gifsicle: { optimizationLevel: 3 },
			pngquant: { quality: '65-90', speed: 4 },
			svgo: { removeUnknownsAndDefaults: false, cleanupIDs: false },
			plugins: [
				ImageminMozjpeg({
					quality: 90,
					progressive: true
				})
			]
		})
	)
}
