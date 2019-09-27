import "core-js/stable";
import "regenerator-runtime/runtime";

const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
	entry: {
		main: ['./src/js/app.js', './src/scss/style.scss'],
	},
	output: {
		path: path.resolve(__dirname, 'public'),
		filename: 'js/app.js',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: '/node_modules/',
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'],
					}
				}
			},
			{
				test: /\.js$/,
				include: '/node_modules/bolts-lib/src/js',
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'],
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
					'sass-loader',
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