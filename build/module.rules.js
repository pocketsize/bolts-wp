// Here we define how all filetypes are to be handled
// If you want to add a filetype , make sure to define it here 
// and reference it in [./webpack.config.js].

const config = require('./editable.config')
const autoprefixer = require('autoprefixer')
const ExtractTextPlugin = require('extract-text-webpack-plugin')

const isDev = !!(process.env.NODE_ENV === 'dev')

module.exports = {
	javascript: {
		test: /\.js$/,
		loader: ['babel-loader', 'eslint-loader']
	},

	sass: {
		test: /\.s[ac]ss$/,
		include: config.paths.sass,
		loader: ExtractTextPlugin.extract({
			use: [
				{
					loader: 'css-loader',
					options: {
						sourceMap: isDev,
						url: false
					}
				},

				{
					loader: 'postcss-loader',
					options: {
						sourceMap: true,
						plugins: () => [autoprefixer(config.settings.autoprefixer)]
					}
				},

				{
					loader: 'sass-loader',
					options: {
						sourceMap: true
					}
				}
			],
			fallback: 'style-loader'
		})
	},

	fonts: {
		test: /\.(eot|ttf|woff|woff2|svg)(\?\S*)?$/,
		include: config.paths.fonts,
		loader: 'file-loader',
		options: {
			publicPath: config.paths.relative,
			name: config.outputs.font.filename,
		}
	},

	images: {
		test: /\.(png|jpe?g|gif|svg)$/,
		include: config.paths.images,
		loader: 'file-loader',
		options: {
			context: config.paths.images,
			publicPath: config.paths.relative,
			name: config.outputs.image.filename,
			emitFile: false
		}
	}
}