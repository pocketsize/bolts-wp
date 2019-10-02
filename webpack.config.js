require('core-js/stable');
require('regenerator-runtime/runtime');

const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
	entry: {
		main: [
			'./src/js/app.js',
			'./src/scss/style.scss'
		],
	},
	output: {
		path: path.resolve(__dirname, 'public'),
		filename: 'js/app.js',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules(?!\/bolts-lib)/,
				use: {
					loader: 'babel-loader',
					options: {
						plugins: [
							['@babel/plugin-transform-runtime', {
								corejs: 3,
							}]
						],
						presets: [
							['@babel/preset-env']
						],
					}
				}
			},
			{
				test: /\.scss$/,
				include: path.resolve(__dirname, 'src/scss'),
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							url: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							ident: 'postcss',
							plugins: [
								require('autoprefixer')(),
							]
						}
					},
					{
						loader: 'sass-loader',
						options: {
							implementation: require('sass'),
						},
					},
				],
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'css/style.css',
		}),

		new CopyPlugin([
			{ from: 'src/images', to: 'images' },
			{ from: 'src/fonts', to: 'fonts' },
		]),
	],
};