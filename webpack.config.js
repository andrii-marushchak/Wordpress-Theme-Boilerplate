const path = require('path');
const webpack = require('webpack');

const MiniCSSExtractPlugin = require('mini-css-extract-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

const isDevelopment = process.env.NODE_ENV === 'development';
const isBuild = process.env.NODE_ENV === 'production';

const srcFolder = path.resolve(__dirname, '.');

const WebpackEntries = {
    // General
    'theme-global-js': `${srcFolder}/assets/js/theme-global.js`,
    'theme-global-css': `${srcFolder}/assets/css/theme-global.scss`,

    // Admin
    'admin-css': `${srcFolder}/assets/css/admin.scss`,


    // Example
    /*
    'page-home-js': `${srcFolder}/dev-assets/js/pages/page-home.js`,
    'page-home-css': `${srcFolder}/dev-assets/css/pages/page-home.scss`,
     */
}

module.exports = {
    watch: isDevelopment,

    entry: {
        ...WebpackEntries
    },

    devtool: isDevelopment ? "eval-source-map" : false,

    mode: process.env.NODE_ENV, // 'development' or 'production

    output: {
        clean: true,
        filename: 'js/[name].js',
        sourceMapFilename: "[name].js.map",
        path: path.resolve(__dirname, './assets/dist/'),
    },

    externals: {
        jquery: 'jQuery'
    },

    plugins: [

        new BrowserSyncPlugin({
            host: "localhost",
            port: 3030,
            proxy: "https://wp.test/",
            notify: true
        }),

        new MiniCSSExtractPlugin({
            filename: "css/[name].css",
            chunkFilename: "[id].css",
            ignoreOrder: true
        }),

        // todo try to comment it out
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery'
        }),

    ],

    module: {

        rules: [

            // JS
            {
                test: /\.(js)$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },

            // SASS
            {
                test: /\.(sa|sc|c)ss$/,
                use:
                    [
                        MiniCSSExtractPlugin.loader,
                        {
                            loader: "css-loader",
                            options: {
                                sourceMap: isDevelopment
                            },
                        },
                      
                        {
                            loader: 'postcss-loader',
                            options: {
                                postcssOptions: {
                                    plugins: [
                                        // Extend postcss-import path resolver to allow glob usage as a path.
                                        // https://github.com/dimitrinicolas/postcss-import-ext-glob
                                        require('postcss-import-ext-glob'),
                                        // This plugin can consume local files, node modules or web_modules
                                        // https://github.com/postcss/postcss-import
                                        require('postcss-import'),
                                        // introduces ^& selector which let you reference any parent ancestor selector with an easy and customizable interface.
                                        // https://github.com/toomuchdesign/postcss-nested-ancestors
                                        require('postcss-nested-ancestors'),
                                        // PostCSS plugin to unwrap nested rules like how Sass does it.
                                        // https://github.com/postcss/postcss-nested
                                        require('postcss-nested'),
                                        // To parse CSS and add vendor prefixes to CSS rules using values from Can I Use.
                                        // https://github.com/postcss/autoprefixer
                                        require('autoprefixer'),
                                        // lets you use Sass-like variables, conditionals, and iterators in CSS.
                                        // https://github.com/jonathantneal/postcss-advanced-variables
                                        require('postcss-advanced-variables'),

                                        require('cssnano')({
                                            preset: 'default',
                                        }),
                                    ],
                                },
                            },
                        },
                        {
                            loader: 'sass-loader',
                            options: {
                                sourceMap: isDevelopment,
                                sassOptions: {
                                    sourceMapContents: isDevelopment,
                                    outputStyle: "expanded"
                                }
                            },
                        },
                    ]
            },

        ],

    },

    optimization: isBuild ? {
        minimize: true,
        minimizer: [
            new CssMinimizerPlugin(),
            new TerserPlugin({
                terserOptions: {
                    compress: {
                        drop_console: true,
                    },
                },
            })
        ],
    } : {},

    resolve: {
        extensions: [
            ".js",
            ".scss",
            ".css"
        ]
    },

};
