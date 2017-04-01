'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    watch = require('gulp-watch'),
    livereload = require('gulp-livereload'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    cache = require('gulp-cache'),
    babel = require('gulp-babel');


gulp.task('sass', function(){
  return gulp.src('./sass/style.scss')
    .pipe(sourcemaps.init())
    .pipe(autoprefixer({
      browsers: ['last 2 version', '> 5%', 'ie 8', 'ie 9'],
      cascade: false
    }))
    .pipe(sass().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./build/'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('./build/'))
    .pipe(notify({message: 'Sass done'}));
});

gulp.task('compress', function(){
  gulp.src([
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

  gulp.watch('sass/**/*.scss', ['sass']);

  gulp.watch('js/**/*.js', ['compress', 'quiz-js', 'thanks-js']);


  livereload.listen();
  // Other watchers
  gulp.watch(['build/**']).on('change', livereload.changed);
  gulp.watch('**/*.php').on('change', livereload.reload);
});

gulp.task('default',['compress', 'modernizr', 'sass']);
