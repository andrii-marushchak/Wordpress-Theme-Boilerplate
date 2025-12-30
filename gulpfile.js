'use strict';

let isProd = false;

const ROOT = __dirname;
const gulp = require('gulp'),
	path = require('path'),
	cssnano = require('cssnano'),
	named = require('vinyl-named'),
	gulpIf = require('gulp-if'),
	sass = require('gulp-sass')(require('sass')),
	autoprefixer = require('autoprefixer'),
	uglify = require('gulp-uglify'),
	notify = require('gulp-notify'),
	plumber = require('gulp-plumber'),
	postcss = require('gulp-postcss'),
	rename = require('gulp-rename'),
	sourcemaps = require('gulp-sourcemaps'),
	rimraf = require('gulp-rimraf'),
	webpack = require('webpack-stream'),
	replace = require('gulp-replace'),
	browserSync = require('browser-sync').create();

/* ACF Layout variables */
const layoutsRoot = 'acf-layouts';
const layoutsScssGlob = `${layoutsRoot}/**/[^_]*.scss`;
const layoutsJsGlob = [`${layoutsRoot}/**/*.js`, `!${layoutsRoot}/**/*.min.js`];

/* Rename Tasks */
const themeTextDomain = '_it_start';

gulp.task('textdomain', () => {
	return gulp
		.src('./**/*', {ignore: ['gulpfile.js', 'node_modules/']})
		.pipe(replace('_it_start', themeTextDomain))
		.pipe(gulp.dest('./'));
});

/* JS Tasks */
gulp.task('admin-js', () => {
	return gulp
		.src('assets/js/admin.js')
		.pipe(
			plumber(
				notify.onError({
					title: 'JS',
					message: 'Error: <%= error.message %>',
				})
			)
		)
		.pipe(
			webpack({
				mode: isProd ? 'production' : 'development',
				output: {
					filename: 'admin.js',
					path: ROOT + '/dist/js/',
				},
			})
		)
		.pipe(
			rename((path) => {
				path.basename += '.min';
			})
		)
		.pipe(uglify())
		.pipe(gulp.dest('./dist/js/'));
});

gulp.task('public-js', () => {
	return gulp
		.src('assets/js/public.js')
		.pipe(
			plumber(
				notify.onError({
					title: 'JS',
					message: 'Error: <%= error.message %>',
				})
			)
		)
		.pipe(
			webpack({
				mode: isProd ? 'production' : 'development',
				output: {
					filename: 'public.js',
					path: ROOT + '/dist/js/',
				},
			})
		)
		.pipe(
			rename((path) => {
				path.basename += '.min';
			})
		)
		.pipe(uglify())
		.pipe(gulp.dest('./dist/js/'));
});

gulp.task('layouts-js', () => {
	return gulp
		.src(layoutsJsGlob, {base: ROOT})
		.pipe(
			plumber(
				notify.onError({
					title: 'JS',
					message: 'Error: <%= error.message %>',
				})
			)
		)
		.pipe(
			named((file) => {
				const relFromRoot = path
					.relative(ROOT, file.path)
					.replace(/\.js$/, '');
				return relFromRoot.replace(/\\/g, '/');
			})
		)
		.pipe(
			webpack({
				mode: isProd ? 'production' : 'development',
				output: {
					filename: '[name].js',
					path: path.join(ROOT, 'dist'),
				},
			})
		)
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest(path.join(ROOT, 'dist')));
});

gulp.task('scss', () => {
	return gulp
		.src(['assets/scss/*.scss'])
		.pipe(gulpIf(!isProd, sourcemaps.init()))
		.pipe(
			sass
				.sync({
					sourceMap: false,
					outputStyle: 'compressed',
					precision: 5,
					includePaths: ['node_modules/'],
				})
				.on('error', sass.logError)
		)
		.pipe(postcss([autoprefixer(), ...(isProd ? [cssnano()] : [])]))
		.pipe(gulpIf(!isProd, sourcemaps.write()))
		.pipe(gulp.dest('dist/css/'))
		.pipe(browserSync.stream());
});

gulp.task('layouts-scss', () => {
	return gulp
		.src(layoutsScssGlob, {base: './'})
		.pipe(
			plumber(
				notify.onError({
					title: 'Layouts SCSS',
					message: 'Error: <%= error.message %>',
				})
			)
		)
		.pipe(gulpIf(!isProd, sourcemaps.init()))
		.pipe(
			sass
				.sync({
					sourceMap: false,
					outputStyle: 'compressed',
					precision: 5,
					includePaths: ['node_modules/'],
				})
				.on('error', sass.logError)
		)
		.pipe(postcss([autoprefixer(), ...(isProd ? [cssnano()] : [])]))
		.pipe(gulpIf(!isProd, sourcemaps.write()))
		.pipe(gulp.dest(path.join(ROOT, 'dist')))
		.pipe(browserSync.stream());
});

/* Transfer images task */
gulp.task('copy-images', () => {
	return gulp
		.src('assets/img/**/*.{gif,jpg,png,svg}', {encoding: false})
		.pipe(gulp.dest('dist/img/'));
});

/* Transfer fonts task */
gulp.task('copy-fonts', () => {
	return gulp
		.src('assets/fonts/**/*', {encoding: false})
		.pipe(gulp.dest('dist/fonts/'));
});

/* Clear everything in dist */
gulp.task('cleanDist', () => {
	return gulp
		.src('dist', {
			allowEmpty: true,
		})
		.pipe(rimraf());
});

/* Change toProd variable */
gulp.task('toProd', (done) => {
	isProd = true;
	done();
});

/*
 * Watch task with browser-sync
 *
 * @link https://browsersync.io/docs/options#option-proxy
 */
gulp.task('actual-watch', () => {
	browserSync.init({
		proxy: 'wp.test', // Change it to your localhost url.
		port: 3000,
		notify: false,
		files: ['./*.php', './**/*.php'],
	});

	// Watch SCSS files
	gulp.watch('assets/scss/**/*.scss', gulp.series('scss')).on(
		'change',
		browserSync.reload
	);

	gulp.watch(`${layoutsRoot}/**/*.scss`, gulp.series('layouts-scss')).on(
		'change',
		browserSync.reload
	);

	// Watch Images
	gulp.watch('assets/img/*', gulp.series('copy-images')).on(
		'change',
		browserSync.reload
	);

	// Watch Fonts
	gulp.watch('assets/fonts/*', gulp.series('copy-fonts')).on(
		'change',
		browserSync.reload
	);

	// Watch Admin JS files
	gulp.watch(
		['assets/js/admin/**/*.js', 'assets/js/admin.js'],
		gulp.series('admin-js')
	).on('change', browserSync.reload);

	// Watch Public JS files
	gulp.watch(
		[
			'assets/js/**/*.js',
			'!assets/js/admin.js',
			'!assets/js/admin/**/*.js',
		],
		gulp.series('public-js')
	).on('change', browserSync.reload);

	// Watch Layout JS files
	gulp.watch(layoutsJsGlob, gulp.series('layouts-js')).on(
		'change',
		browserSync.reload
	);

});

/* Build dev */
gulp.task('dev', gulp.parallel(
		'scss',
		'layouts-scss',
		'copy-images',
		'copy-fonts',
		'admin-js',
		'public-js',
		'layouts-js',
	)
);

/* Build to prod task */
gulp.task('build', gulp.series(
		'toProd',
		'cleanDist',
		'scss',
		'layouts-scss',
		'copy-images',
		'copy-fonts',
		'admin-js',
		'public-js',
		'layouts-js',
	)
);

gulp.task('watch', gulp.series('dev', 'actual-watch'));
gulp.task('default', gulp.parallel('watch'));
