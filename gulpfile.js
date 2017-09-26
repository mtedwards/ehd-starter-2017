'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    watch = require('gulp-watch'),
    livereload = require('gulp-livereload'),
    autoprefixer = require('autoprefixer'),
    cssnano = require('cssnano'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    babel = require('gulp-babel'),
    postcss = require('gulp-postcss');


  gulp.task('sass', function(){
    var plugins = [
          autoprefixer()
      ];
    return gulp.src('./sass/style.scss')
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(postcss(plugins))
      .pipe(sourcemaps.write())
      .pipe(gulp.dest('./build/'))
      .pipe(notify({message: 'Sass done'}));
  });

  gulp.task('sass-min', function(){
  var plugins = [
        autoprefixer(),
        cssnano()
    ];
  return gulp.src('./sass/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(plugins))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./build/'))
    .pipe(notify({message: 'Sass Min done'}));
});

gulp.task('compress', function(){
  gulp.src([
    'node_modules/slick-carousel/slick/slick.js',
    'node_modules/fitvids/dist/fitvids.js',
    'js/navigation.js',
    'js/app.js'
  ])
  .pipe(concat('production.js'))
  .on('error', notify.onError("Error: <%= error.message %>"))
  .pipe(babel({
    presets: ['es2015']
  }))
  .pipe(gulp.dest('./build/'))
  .pipe(uglify())
  .on('error', notify.onError("Error: <%= error.message %>"))
  .pipe(rename({
      extname: ".min.js"
   }))
   .pipe(gulp.dest('./build/'))
   .pipe(notify({message: 'JS done'}));
});

gulp.task('modernizr', function(){
  gulp.src([
    'js/modernizr-custom.js'
  ])
  .pipe(concat('modernizr-custom.js'))
  .on('error', notify.onError("Error: <%= error.message %>"))
  .pipe(gulp.dest('./build/'))
  .pipe(uglify())
  .on('error', notify.onError("Error: <%= error.message %>"))
  .pipe(rename({
      extname: ".min.js"
   }))
   .pipe(gulp.dest('./build/'))
   .pipe(notify({message: 'JS done'}));
});


gulp.task('watch', function(){

  gulp.watch('sass/**/*.scss', ['sass', 'sass-min']);

  gulp.watch('js/**/*.js', ['compress']);


  livereload.listen();
  // Other watchers
  gulp.watch(['build/**']).on('change', livereload.changed);
  gulp.watch('**/*.php').on('change', livereload.reload);
});

gulp.task('default',['compress', 'modernizr', 'sass', 'sass-min']);
