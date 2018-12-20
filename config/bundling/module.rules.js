/**
 * Here we define how all filetypes are to be handled
 * If you want to add a filetype , make sure to define it here
 * and reference it in [./webpack.config.js].
 */

const config = require('./editable.config');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const MQPacker = require('css-mqpacker');
const CSSNano = require('cssnano');

const isDev = !!(process.env.ENV === 'dev');
const isProd = !!(process.env.ENV === 'prod');

module.exports = {
    javascript: {
        test: /\.(js|jsx)$/,
        exclude: config.paths.external,
        loader: ['babel-loader'],
    },

    sass: {
        test: /\.s[ac]ss$/,
        include: config.paths.sass,
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
                    plugins: () => [
                        autoprefixer(config.settings.autoprefixer),
                        MQPacker(),
                        isProd
                            ? CSSNano()
                            : () => {
                                console.log('\nSkipping CSSNano\n');
                            },
                    ],
                },
            },
            'sass-loader',
        ],
    },

    fonts: {
        test: /\.(eot|ttf|woff|woff2|svg)(\?\S*)?$/,
        include: config.paths.fonts,
        loader: 'file-loader',
        options: {
            publicPath: config.paths.relative,
            name: config.outputs.font.filename,
        },
    },

    images: {
        test: /\.(png|jpe?g|gif|svg)$/,
        include: config.paths.images,
        loader: 'file-loader',
        options: {
            context: config.paths.images,
            publicPath: config.paths.relative,
            name: config.outputs.image.filename,
            emitFile: false,
        },
    },
};
