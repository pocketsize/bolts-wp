require('core-js/stable')
require('regenerator-runtime/runtime')

const path = require('path')

const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
	entry: {
		main: [
			'./src/js/polyfills.js',
			'./src/js/main.js',
			'./src/scss/main.scss'
		]
	},
	output: {
		path: path.resolve(__dirname, 'public'),
		filename: 'js/[name].js'
	},
	module: {
		rules: [
			{
				test: /\.js|\.jsx$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						plugins: [
							[
								'@babel/plugin-transform-runtime',
								{
									corejs: 3
								}
							]
						],
						presets: ['@babel/preset-env', '@babel/preset-react']
					}
				}
			},
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							url: false
						}
					},
					{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss',
							plugins: [require('autoprefixer')()]
						}
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require('sass')
						}
					}
				]
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'css/[name].css'
		})
	]
}
