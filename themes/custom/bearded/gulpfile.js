var gulp = require('gulp'),
    livereload = require('gulp-livereload'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    uglify = require('gulp-uglifyjs');

// IMAGES
gulp.task('imagemin', function () {
    return gulp.src('./assets/images/*.svg')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{ removeViewBox: false }],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./img'));
});
// SASS
gulp.task('sass', function () {
    gulp.src('./scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./css'));
});
// JS
gulp.task('uglify', function () {
    gulp.src('./js/*.js')
        .pipe(uglify('main.js'))
        .pipe(gulp.dest('./js'))
});

gulp.task('watch', function () {
    livereload.listen();

    gulp.watch('./js/*.js', ['uglify']);
    gulp.watch('./bootstrap/assets/images/*.svg', ['imagemin']);
    gulp.watch('./scss/**/*.scss', ['sass']);
    gulp.watch(['./css/style.css', './**/*.html.twig', './assets/js/*.js'], function (files) {
        livereload.changed(files)
    });
});
