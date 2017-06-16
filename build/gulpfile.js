
var gulp = require('gulp'),
    less = require('gulp-less'),
    concatCSS = require('gulp-concat-css'),
    LessAutoprefix = require('less-plugin-autoprefix'),
    autoprefix = new LessAutoprefix({ browsers: ['last 15 versions', '> 1%', 'ie 8'] }),
    browserSync = require('browser-sync'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglifyjs'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    del = require('del'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    cache = require('gulp-cache');

gulp.task('less', function(){
  return gulp.src('app/less/**/*.less')
  .pipe(less({
    plugins: [autoprefix]
  }))
  /*.pipe(concatCSS("style.css"))*/
  .pipe(gulp.dest('app/css'))
  .pipe(browserSync.reload({stream:true}))
});

gulp.task('scripts', function(){
  return gulp.src([
    'app/libsjs/*.js',
  ])
  .pipe(concat('libs.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('app/js'))
});

gulp.task('css', function(){
  return gulp.src([
    'app/libscss/*.css',
  ])
  .pipe(concat('libs.css'))
  .pipe(cssnano())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('app/css'))
});

gulp.task('css-libs', function(){
  return gulp.src('app/css/libs.css')
  .pipe(cssnano())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest(app/css))
});

gulp.task('browser-sync', function(){
  browserSync({
    server: {
      baseDir: 'app'
    },
    notify: false
  });
});

gulp.task('clean', function(){
  return del.sync('dist')
});

gulp.task('clear', function(){
  return cache.clearAll();
});

gulp.task('img', function(){
  return gulp.src('app/images/**/*')
  .pipe(cache(imagemin({
    interlaced: true,
    progressive: true,
    svgoPlugins: [{removeViewbox: false}],
    une:[pngquant()]
  })))
  .pipe(gulp.dest('dist/images'))
});

gulp.task('watch', ['browser-sync', 'css', 'less', 'scripts'],  function(){
  gulp.watch('app/libscss/**/*.css', ['css']);
  gulp.watch('app/less/**/*.less', ['less']);
  gulp.watch('app/*.html', browserSync.reload);
  gulp.watch('app/js/**/*.js', browserSync.reload);
});


gulp.task('build', ['clean', 'img', 'css', 'less', 'scripts'], function(){
  var buildCss = gulp.src([
    'app/css/*.css',
  ])
  .pipe(gulp.dest('dist/css'));

  var buildFonts = gulp.src('app/fonts/**/*')
  .pipe(gulp.dest('dist/fonts'));

  var buildJs = gulp.src([
    'app/js/libs.min.js',
    'app/js/scripts.js',
	'app/js/*',
  ])
  .pipe(gulp.dest('dist/js'));

  var buildHtml = gulp.src('app/*.html')
  .pipe(gulp.dest('dist'));

  gulp.src('app/videobg/*')
      .pipe(gulp.dest('dist/videobg'));

});

gulp.task('move', [], function () {
  gulp.src('dist/css/*.css')
      .pipe(gulp.dest('../frontend/web/css'));
  gulp.src('dist/js/*.js')
      .pipe(gulp.dest('../frontend/web/js'));
  gulp.src('dist/videobg/*')
      .pipe(gulp.dest('../frontend/web/videobg'));
  gulp.src('dist/images/**/*')
      .pipe(gulp.dest('../frontend/web/images'));
});
