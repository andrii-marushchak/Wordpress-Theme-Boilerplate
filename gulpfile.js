// Node
import del from "del"
import through from "through2"

// Gulp
import gulp from "gulp"
import plumber from "gulp-plumber"
import sourcemaps from "gulp-sourcemaps"
import gulpif from "gulp-if"
import notify from "gulp-notify"
import size from 'gulp-filesize'

// SASS
import dartSass from 'sass'
import gulpSass from 'gulp-sass'

// PostCSS
import postcss from 'gulp-postcss'
import autoprefixer from 'autoprefixer'
import cssnano from 'cssnano'
import sortMediaQueries from 'postcss-sort-media-queries'

// JS & Webpack
import webpack from "webpack"
import webpackStream from "webpack-stream"

// WordPress
import wpPot from 'gulp-wp-pot'


// Enviroment
import {setDevelopmentEnvironment, setProductionEnvironment, isProduction, isDevelopment} from 'gulp-node-env'

setDevelopmentEnvironment()

// BrowserSync
import bs from "browser-sync"

const browserSync = bs.create()

const srcFolder = '.'
const buildFolder = './assets/dist/'

const paths = {
    php: {
        src: [
            '*.php',
            '**/*.php',
            'theme/**/*.php',
            'pages/**/*.php',
            'templates/**/*.php',
            'template-parts/**/*.php',
            'inc/**/*.php',
        ],
    },
    scss: {
        src: [
            `${srcFolder}/assets/css/*.scss`,
            `${srcFolder}/assets/css/components/*.scss`,
            `${srcFolder}/assets/css/other/*.scss`,
            `${srcFolder}/assets/css/pages/*.scss`,
            `${srcFolder}/assets/css/sections/*.scss`,
            `${srcFolder}/assets/css/vendors/*.scss`,
        ],
        dest: `${buildFolder}/css/`
    },
    js: {
        src: [
            `${srcFolder}/assets/js/scripts.js`,
            `${srcFolder}/assets/js/components/*.js`,
            `${srcFolder}/assets/js/functions/*.js`,
        ],
        dest: `${buildFolder}/js/`
    },
    vendors: {
        src: `${srcFolder}/assets/vendors/**/**/*`,
    },
    fonts: {
        src: [
            `${srcFolder}/assets/fonts/**/**/*`
        ],
    }
}

const serve = () => {
    const domain = 'https://startlife.test'
    browserSync.init({
        proxy: domain,
        notify: false,
        port: 4001
    })
}

const reload = () => {
    browserSync.reload()
}

const clean = () => {
    return del(buildFolder)
}

const scss = () => {
    const sass = gulpSass(dartSass)

    return gulp.src(paths.scss.src)
        .pipe(plumber({
            errorHandler: function (err) {
                notify.onError({
                    title: "SCSS Error",
                    message: "<%= error.message %>"
                })(err)
            }
        }))
        .pipe(gulpif(isDevelopment, sourcemaps.init()))

        // SCSS
        .pipe(sass().on('error', sass.logError))

        // Dev PostCSS
        .pipe(gulpif(isDevelopment, postcss([
            autoprefixer(),
        ])))

        // Build PostCSS
        .pipe(gulpif(isProduction, postcss([
            autoprefixer(),
            cssnano({
                autoprefixer: true,
                cssDeclarationSorter: true,
                calc: true,
                colormin: true,
                convertValues: true,
                discardComments: {removeAll: true},
                discardDuplicates: true,
                discardEmpty: true,
                discardOverridden: true,
                discardUnused: true,
                mergeIdents: true,
                mergeLonghand: true,
                mergeRules: true,
                minifyFontValues: true,
                minifyGradients: true,
                minifyParams: true,
                minifySelectors: true,
                normalizeCharset: true,
                normalizeDisplayValues: true,
                normalizePositions: true,
                normalizeRepeatStyle: true,
                normalizeString: true,
                normalizeTimingFunctions: true,
                normalizeUnicode: true,
                normalizeUrl: true,
                normalizeWhitespace: true,
                orderedValues: true,
                reduceIdents: true,
                reduceInitial: true,
                reduceTransforms: true,
                svgo: true,
                uniqueSelectors: true,
                zindex: false,
            }),
            sortMediaQueries({
                sort: 'desktop-first' // default
            })
        ])))

        .pipe(gulpif(isDevelopment, sourcemaps.write('./')))
        .pipe(gulp.dest(paths.scss.dest))
        .pipe(size())
        .pipe(browserSync.stream())
}

const js = () => {
    return gulp.src(paths.js.src)
        .pipe(plumber({
            errorHandler: function (err) {
                notify.onError({
                    title: "JS Error",
                    message: "<%= error.message %>"
                })(err)
            }
        }))

        // Webpack Development
        .pipe(gulpif(isDevelopment,
            webpackStream({
                devtool: "eval-source-map",
                mode: 'development',
                module: {
                    rules: [
                        {
                            test: /\.(js)$/,
                            exclude: /(node_modules)/,
                            use: ['babel-loader']
                        },
                    ],
                },
                plugins: [
                    new webpack.ProvidePlugin({
                        $: 'jquery',
                        jQuery: 'jquery',
                    }),
                    new webpack.AutomaticPrefetchPlugin(),
                    new webpack.optimize.LimitChunkCountPlugin({
                        maxChunks: 1
                    })
                ],
                experiments: {
                    topLevelAwait: true,
                },
                output: {
                    filename: '[name].js',
                    sourceMapFilename: "[name].js.map"
                },
            })
        )).on('error', function handleError() {
            this.emit('end'); // Recover from errors
        })

        // Webpack Production
        .pipe(gulpif(isProduction(),
            webpackStream({
                devtool: false,
                mode: 'production',
                module: {
                    rules: [
                        {
                            test: /\.(js)$/,
                            exclude: /(node_modules)/,
                            use: ['babel-loader']
                        },
                    ],
                },
                plugins: [
                    new webpack.ProvidePlugin({
                        $: 'jquery',
                        jQuery: 'jquery',
                    }),
                    new webpack.AutomaticPrefetchPlugin(),
                    new webpack.optimize.LimitChunkCountPlugin({
                        maxChunks: 1
                    })
                ],
                experiments: {
                    topLevelAwait: true,
                },
                output: {
                    filename: '[name].js',
                    sourceMapFilename: "[name].js.map"
                },
            })
        )).on('error', function handleError() {
            this.emit('end'); // Recover from errors
        })

        .pipe(gulpif(isDevelopment, sourcemaps.init()))
        .pipe(through.obj(function (file, enc, cb) {
            const isSourceMap = /\.map$/.test(file.path);
            if (!isSourceMap) this.push(file);
            cb();
        }))
        .pipe(gulpif(isDevelopment, sourcemaps.write('./')))
        .pipe(gulp.dest(paths.js.dest))
        .pipe(size())
        .pipe(browserSync.stream())
}


const watch = () => {
    // SCSS
    gulp.watch(paths.scss.src, gulp.series(scss))

    // JS
    gulp.watch(paths.js.src, gulp.series(js))

    // Vendors folder
    gulp.watch(paths.vendors.src, gulp.series(reload))

    // Fonts
    gulp.watch(paths.fonts.src, gulp.series(reload))
}

const pot = () => {
    return gulp.src(paths.php.src)
        .pipe(wpPot({
            domain: 'startlife',
            package: 'startlife'
        }))
        .pipe(gulp.dest('lang/startlife.pot'));
}

export {serve, reload, watch, clean, scss, js, pot}

const dev = gulp.series(setDevelopmentEnvironment, clean, gulp.parallel(scss, js, pot), gulp.parallel(watch, serve))
const build = gulp.series(setProductionEnvironment, clean, gulp.parallel(scss, js, pot))


export {dev, build}
export {dev as default}