// !!! DONT EDIT THIS FILE !!!
// Changes to the Webpack settings are better done in [./editable.config.js].
// Only edit this file if you REEEEALY want to get freaky with the config.

require('dotenv').config({ path: '../../../../../../' }); // lol TODO: Make this better for when we launch this outside of coolbelt
const CopyWebpackPlugin = require('copy-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const ImageminMozjpeg = require('imagemin-mozjpeg');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');

const moduleRules = require('./module.rules');
const config = require('./editable.config');

const isDev = !!(process.env.ENV === 'dev');
const isProd = !!(process.env.ENV === 'prod');
const doServe = !!(process.env.SERVE === 'true');

module.exports = {
    // Entry points.
    entry: config.entrypoints,

    // JS output name and destination.
    output: {
        path: config.paths.public,
        filename: config.outputs.javascript.filename,
    },

    // External dependencies.
    externals: config.externals,

    // Custom resolutions.
    resolve: config.resolve,

    // Rules for handling filetypes.
    module: {
        rules: [
            moduleRules.javascript,
            moduleRules.sass,
            moduleRules.fonts,
            moduleRules.images,
        ],
    },

    // Plugins running in every build.
    plugins: [
        new FriendlyErrorsWebpackPlugin(),
        new MiniCssExtractPlugin(config.outputs.css),
        new CleanWebpackPlugin(config.paths.public, {
            root: config.paths.root,
        }),
        new CopyWebpackPlugin([
            {
                context: config.paths.images,
                from: {
                    glob: `${config.paths.images}/**/*`,
                    flatten: false,
                    dot: false,
                },
                to: config.outputs.image.filename,
            },
        ]),
        new CopyWebpackPlugin([
            {
                context: config.paths.fonts,
                from: {
                    glob: `${config.paths.fonts}/**/*`,
                    flatten: false,
                    dot: false,
                },
                to: config.outputs.font.filename,
            },
        ]),
    ],

    devtool: isDev ? config.settings.sourceMaps : false,
};

// Set BrowserSync and devServer settings if serving
if (doServe) {
    // setting our default settings...
    const browserSyncSettings = {
        host: 'localhost',
        port: 3000,
        proxy: process.env.WP_HOME,
        files: [
            {
                match: ['../../**/*.php'],
                fn: function(event, file) {
                    if (event === 'change') {
                        this.reload();
                    }
                },
            },
        ],
    };

    // ...and overwriting them with user settings
    Object.assign(browserSyncSettings, config.settings.browserSync);

    module.exports.plugins.push(new BrowserSyncPlugin(browserSyncSettings));
    module.exports.devServer = config.settings.devServer;
}

// Optimize if prod
// if (isProd) {
// 	module.exports.plugins.push(
// 		new ImageminPlugin({
// 			test: /\.(jpe?g|png|gif|svg)$/i,
// 			optipng: { optimizationLevel: 7 },
// 			gifsicle: { optimizationLevel: 3 },
// 			pngquant: { quality: '65-90', speed: 4 },
// 			svgo: { removeUnknownsAndDefaults: false, cleanupIDs: false },
// 			plugins: [
// 				ImageminMozjpeg({
// 					quality: 90,
// 					progressive: true
// 				})
// 			]
// 		})
// 	)
// }
