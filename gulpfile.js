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

// Images
import newer from "gulp-newer"
import imagemin, {gifsicle, mozjpeg, optipng, svgo} from 'gulp-imagemin'
import imageminJpegoptim from 'imagemin-jpegoptim';
import tinypng from 'gulp-tinypng-compress'
import webp from 'gulp-webp'
import avif from 'gulp-avif'


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
    img: {
        srcForOptimization: `${srcFolder}/assets/img/**/**/*.{jpg,png,jpeg}`,
        srcForConversion: `${srcFolder}/assets/img/**/**/*.{jpg,png,jpeg}`,
        src_dest: `${srcFolder}/assets/img/`,
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
    const domain = 'localhost/theme_domain'
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

const imgOptimization = () => {
    return gulp.src(paths.img.srcForOptimization)
        .pipe(plumber({
            errorHandler: function (err) {
                notify.onError({
                    title: "IMG Error",
                    message: "<%= error.message %>"
                })(err)
            }
        }))

        // Images Compression
        .pipe(newer(paths.img.src_dest))  // Loop only new images

        .pipe(imagemin([
            // GIF
            gifsicle({interlaced: true}),

            // PNG
            optipng({optimizationLevel: 5}),

            // SVG
            svgo({}),

            // JPG
            mozjpeg({quality: 70, progressive: true}),
            imageminJpegoptim({
                progressive: true,
                stripAll: true,
                stripXmp: true,
                stripIptc: true,
                stripCom: true,
                stripIcc: true,
                stripExif: true,
            })
        ], {
            optimizationLevel: 5,
            progressive: true,
        }))

        /*
        .pipe(tinypng({
            key: '', // https://tinify.cn/dashboard/api
            log: true
        }))
        */

        .pipe(gulp.dest(paths.img.src_dest))
}

const imgWebPConversion = () => {
// WebP
    return gulp.src(paths.img.srcForConversion)
        .pipe(plumber({
            errorHandler: function (err) {
                notify.onError({
                    title: "WebP Conversion Error",
                    message: "<%= error.message %>"
                })(err)
            }
        }))
        .pipe(gulpif(isDevelopment(), newer(paths.img.srcForConversion)))
        .pipe(webp({
                quality: 70,
                alphaQuality: 85,
                metadata: 'none',
            }
        ))
        .pipe(gulp.dest(paths.img.src_dest))
}

const imgAvifConversion = () => {
// Avif
    return gulp.src(paths.img.srcForConversion)
        .pipe(plumber({
            errorHandler: function (err) {
                notify.onError({
                    title: "Avif Conversion Error",
                    message: "<%= error.message %>"
                })(err)
            }
        }))
        .pipe(gulpif(isDevelopment(), newer(paths.img.srcForConversion)))

        .pipe(avif({
            quality: 70,
            speed: 8,
        }))

        .pipe(gulp.dest(paths.img.src_dest))
}

const watch = () => {
    // SCSS
    gulp.watch(paths.scss.src, gulp.series(scss))

    // JS
    gulp.watch(paths.js.src, gulp.series(js))

    // Images
    gulp.watch(paths.img.srcForOptimization, gulp.series(imgOptimization, imgWebPConversion, imgAvifConversion))

    // Vendors folder
    gulp.watch(paths.vendors.src, gulp.series(reload))

    // Fonts
    gulp.watch(paths.fonts.src, gulp.series(reload))
}

const pot = () => {
    return gulp.src(paths.php.src)
        .pipe(wpPot({
            domain: 'theme_domain',
            package: 'theme_domain'
        }))
        .pipe(gulp.dest('lang/theme_domain.pot'));
}

export {serve, reload, watch, clean, scss, js, imgOptimization, imgWebPConversion, imgAvifConversion, img, pot}

const img = gulp.series(imgOptimization, imgWebPConversion, imgAvifConversion);
const dev = gulp.series(setDevelopmentEnvironment, clean, gulp.parallel(scss, js, img, pot), gulp.parallel(watch, serve))
const build = gulp.series(setProductionEnvironment, clean, gulp.parallel(scss, js, img, pot))


export {dev, build}
export {dev as default}