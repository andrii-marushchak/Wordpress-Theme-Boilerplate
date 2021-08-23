const gulp = require('gulp'),
    webpack = require("webpack-stream"),
    browserSync = require('browser-sync').create(),
    babel = require('gulp-babel'),
    uglify = require('gulp-uglify-es').default,
    sass = require("gulp-sass"),
    cleanCSS = require('gulp-clean-css'),
    autoprefixer = require('gulp-autoprefixer'),
    through = require('through2'),
    sourcemaps = require('gulp-sourcemaps'),
    rename = require("gulp-rename"),
    del = require("del"),
    plumber = require("gulp-plumber"),
    imagemin = require('gulp-imagemin'),
    image = require('gulp-image'),
    wpPot = require('gulp-wp-pot');

const domain = 'localhost/um';
const webpackModules = true;

const paths = {
    scss: {
        src: [
            'assets/css/*.scss',
            'assets/css/components/*.scss',
            'assets/css/other/*.scss',
            'assets/css/pages/*.scss',
            'assets/css/sections/*.scss',
        ],
        dest: 'assets/dist/css/'
    },
    js: {
        src: ['assets/js/scripts.js', 'assets/js/components/**/*.js', 'assets/js/**/*.js'],
        dest: 'assets/dist/js/'
    },
    img: {
        src: 'assets/img/**/**/*',
        dest: 'assets/img/'
    },
};

function serve() {
    browserSync.init({
        proxy: domain,
        notify: false
    });
}

function cleanFolder() {
    return del('assets/dist');
}

function reload(done) {
    browserSync.reload();
    done();
}

function watch() {
    // SCSS
    gulp.watch(paths.scss.src, gulp.series(scss));

    // JS
    gulp.watch(paths.js.src, gulp.series(js));

    // Images
    gulp.watch(paths.img.src, gulp.series(reload));
}


if (webpackModules) {
    function js(done) {
        return gulp.src(paths.js.src)
            .pipe(plumber())
            .pipe(webpack({
                config: require('./webpack.config.js')
            }))
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(through.obj(function (file, enc, cb) {
                const isSourceMap = /\.map$/.test(file.path);
                if (!isSourceMap) this.push(file);
                cb();
            }))
            .pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(paths.js.dest))
            .pipe(browserSync.stream())
        done();
    }
} else {
    function js(done) {
        return gulp.src(paths.js.src)
            .pipe(plumber())
            .pipe(sourcemaps.init())
            .pipe(babel({presets: ['@babel/env']}))
            .pipe(rename("scripts.min.js"))
            .pipe(uglify())
            .pipe(sourcemaps.write('.'))
            .pipe(gulp.dest(paths.js.dest))
            .pipe(browserSync.stream());
        done();
    }
}

function scss(done) {
    return gulp.src(paths.scss.src)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: ["last 10 versions"],
            cascade: false,
            grid: true
        }))
        .pipe(cleanCSS())
        .pipe(rename("styles.min.css"))
        .pipe(sourcemaps.write('../css'))
        .pipe(gulp.dest(paths.scss.dest))
        .pipe(browserSync.stream());
    done();
}

function img(done) {
    return gulp.src(paths.img.src)
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(image({
            svgo: false
        }))
        .pipe(gulp.dest(paths.img.dest));
    done();
}


function pot() {
    return gulp.src([
        '*.php',
        '**/*.php',
        'theme/**/*.php',
        'pages/**/*.php',
        'template-parts/**/*.php',
        'inc/**/*.php',
    ])
        .pipe(wpPot({
            domain: 'united_me',
            package: 'United Me'
        }))
        .pipe(gulp.dest('lang/um.pot'));
}

exports.serve = serve;
exports.reload = reload;
exports.watch = watch;
exports.js = js;
exports.scss = scss;
exports.img = img;
exports.pot = pot;
exports.default = gulp.series(cleanFolder, gulp.parallel(scss, js), gulp.parallel(watch, serve));


