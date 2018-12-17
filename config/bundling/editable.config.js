/** 
 * This is your very own config file for the Webpack bundling, where
 * you can customize the most common parts of the build process.
 * We believe this is all you might be interested in, but dont be afraid to
 * submit an issue or a pull request if you disagree. We would love to hear from you.
 * 
 * Check the Webpack documentation for more in-depth info on all the different settings.
 * https://webpack.js.org/configuration/
 */ 


const path = require('path')

module.exports = {
	// These are all paths used in the build process.
	// Change them if you prefer a different project structure.
	paths: {
		root: path.resolve(__dirname, '../../'),
		public: path.resolve(__dirname, '../../public'),
		src: path.resolve(__dirname, '../../src'),
		javascript: path.resolve(__dirname, '../../src/js'),
		sass: path.resolve(__dirname, '../../src/sass'),
		fonts: path.resolve(__dirname, '../../src/fonts'),
		images: path.resolve(__dirname, '../../src/images'),
		relative: '../../',
		external: /node_modules/
	},

	// These are the entry points for scripts and styles.
	// Remember to enqueue the outputs of any added files in [../functions.php].
	// The output name will be the one of the chunk. If the chunk is named "main" the output will be "main.js"
	entrypoints: {
		main: ['./src/js/app.js', './src/sass/style.scss']
	},

	// Names and paths for all output files, relative to [../public/].
	// Check out [./webpack.config.js] if you want naming based on dev/prod.
	// There we check for isDev and isProd
	outputs: {
		javascript: { filename: 'js/[name].js' },
		css: { filename: 'css/[name].css' },
		font: { filename: 'fonts/[path][name].[ext]' },
		image: { filename: 'images/[path][name].[ext]' }
	},

	// Sometimes we want to load libraries from CDN and retrieve them at runtime.
	// These are our external dependencies that should be available to our modules, but not compiled.
	// Enqueue them via CDN in [../functions.php] instead.
	externals: {
		//'jquery': 'jQuery'
	},

	// If you have any custom module resolutions you prefer, this is the place to be.
	resolve: {
	},

	// All other settings reside here. 
	// 
	// Check https://webpack.js.org/configuration/devtool/ for sourcemap configs
	//
	// BrowserSync settings have defaults defined in [./webpack.config.js], most notably
	// a "file"-setting that triggers a reload on changes in all PHP-files.
	// Thake that in account if you want to change that setting.
	settings: {
		sourceMaps: 'cheap-module-source-map',
		autoprefixer: {
			browsers: ['last 3 versions', '> 1%', 'ie >= 10'],
		},
		browserSync: {
			host: 'localhost',
			port: 3000
		}
	}
}