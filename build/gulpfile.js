var gulp = require('gulp'),
    less = require('gulp-less'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    cssnano = require('gulp-cssnano');



gulp.task('build-images', function() {
    gulp.src('./app/images/**/*.*')
        .pipe(gulp.dest('../frontend/web/images'));
});

gulp.task('build-less', function() {
    gulp.src('./app/less/styles.less')
        .pipe(less())
        .pipe(concat('styles.css'))
        .pipe(cssnano())
        .pipe(gulp.dest('../frontend/web/css'))
});

gulp.task('build-js', function () {
    gulp.src('./app/js/*')
        .pipe(gulp.dest('../frontend/web/js'));
});

gulp.task('build-css-libs', function(){
    gulp.src(['./app/libscss/*.css'])
        .pipe(concat('libs.min.css'))
        .pipe(cssnano())
        .pipe(gulp.dest('../frontend/web/css'))
});

gulp.task('build-js-libs', function() {
   gulp.src('./app/libsjs/*.js')
       .pipe(concat('libs.min.js'))
       .pipe(uglify())
       .pipe(gulp.dest('../frontend/web/js'));
});

gulp.task('debug', [
    'build-images',
    'build-less',
    'build-css-libs',
    'build-js',
    'build-js-libs'
], function () {
    gulp.watch('./app/images/**/*.*', ['build-images']);

    gulp.watch('./app/less/**/*.*', ['build-less']);
    gulp.watch('./app/js/**/*.*', ['build-js']);

    gulp.watch('./app/libscss/**/*.*', ['build-css-libs']);
    gulp.watch('./app/libsjs/**/*.*', ['build-js-libs']);
});