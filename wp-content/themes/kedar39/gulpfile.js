var syntax        = 'sass';

var gulp         = require('gulp'),
	sass         = require('gulp-sass'),
	browserSync  = require('browser-sync').create(),
	concat       = require('gulp-concat'),
	uglify       = require('gulp-uglify-es').default,
	cleancss     = require('gulp-clean-css'),
	autoprefixer = require('gulp-autoprefixer'),
	rsync        = require('gulp-rsync'),
	newer        = require('gulp-newer'),
	rename       = require('gulp-rename'),
	del          = require('del'),
	gcmq		 = require('gulp-group-css-media-queries');

// Local Server
gulp.task('browser-sync', function() {
	browserSync.init({
        proxy: "localhost:81/Aeroland/"
    });
});
function bsReload(done) { browserSync.reload(); done(); };

// Custom Styles
gulp.task('styles', function() {
	return gulp.src('app/sass/**/*.sass')
	.pipe(sass({
		outputStyle: 'expanded',
		includePaths: [__dirname + '/node_modules']
	}))
	.pipe(concat('styles.min.css'))
	.pipe(autoprefixer({
		grid: true,
		overrideBrowserslist: ['last 10 versions']
	}))
	.pipe(gcmq())
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Optional. Comment out when debugging
	.pipe(gulp.dest('assets/css'))
	.pipe(browserSync.stream())
});

// Custom Scripts
gulp.task('scripts', function() {
	return gulp.src([
		//'node_modules/jquery/dist/jquery.min.js', // Optional jQuery plug-in (npm i --save-dev jquery)
		'app/js/_libs.js', // JS libraries (all in one)
		'app/js/_custom.js', // Custom scripts. Always at the end
		])
	.pipe(concat('scripts.min.js'))
	.pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('assets/js'))
	.pipe(browserSync.reload({ stream: true }))
});

// Code & Reload
gulp.task('code', function() {
	return gulp.src('./**/*.php')
	.pipe(browserSync.reload({ stream: true }))
});

// Move Fonts to directory
gulp.task('fonts', function() {
	return gulp.src('app/fonts/**/*.*')
	.pipe(gulp.dest('assets/fonts'))
});

// Deploy
gulp.task('deploy', function() {
    return gulp.src(['assets/**/*', 'layouts/**/*', '*.php', 'template-parts/*', 'page-templates/**/*', 'includes/**/*', '*.css','*.png'])
        .pipe(rsync({
            hostname: 'e59717@hostde19.fornex.host',
            destination: '/home/e59717/public_html/beta.brandlif.ru/wp-content/themes/Brandlif/',
            port: 20022,
            archive: true,
			silent: false,
			compress: true,
			options: {
				chmod: "ugo=rwX",
				'no-p': true
			}
    }))
});

// Watch Gulp
gulp.task('watch', function() {
	gulp.watch('app/sass/**/*.sass', gulp.parallel('styles'/*,'deploy'*/));
	gulp.watch(['app/js/_custom.js', 'app/js/_libs.js'], gulp.parallel('scripts'/*,'deploy'*/));
	gulp.watch('./**/*.php', gulp.parallel('code'/*,'deploy'*/));
});
gulp.task('default', gulp.parallel('styles', 'fonts', 'scripts', 'code', 'browser-sync',/* 'deploy', */'watch'));