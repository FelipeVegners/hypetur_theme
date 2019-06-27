"use strict"

var gulp = require('gulp'),
  sass = require('gulp-sass'),
  del = require('del'),
  uglify = require('gulp-uglify'),
  cleanCSS = require('gulp-clean-css'),
  rename = require("gulp-rename"),
  merge = require('merge-stream'),
  concat = require('gulp-concat'),
  plumber = require('gulp-plumber'),
  gutil = require('gulp-util'),
  htmlreplace = require('gulp-html-replace'),
  autoprefixer = require('gulp-autoprefixer'),
  browserSync = require('browser-sync').create()

// Compile SCSS(SASS) files
gulp.task('scss', function compileScss() {
  return gulp.src(['./app/styles/scss/init.scss'])
    .pipe(sass.sync({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(rename('style.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./wp-content/themes/hypetur'))
    .pipe(browserSync.reload({ stream: true }))
})

// // Minify CSS
// gulp.task('css:minify', gulp.series('scss', function cssMinify() {
//   return gulp.src("./assets/css/app.css")
//     .pipe(cleanCSS())
//     .pipe(rename({
//       suffix: '.min'
//     }))
//     .pipe(gulp.dest('./dist/assets/css'))
//     .pipe(browserSync.stream())
// }))

// Concat and Minify Js
gulp.task('js', function () {
  return gulp.src(['./app/scripts/**/*.js'])
    //prevent pipe breaking caused by errors from gulp plugins
    .pipe(plumber())
    //this is the filename of the compressed version of our JS
    .pipe(concat('app.js'))
    //catch errors
    .on('error', gutil.log)
    //where we will store our finalized, compressed script
    .pipe(gulp.dest('wp-content/themes/hypetur/scripts'))
    .pipe(gulp.dest('./wp-content/themes/hypetur/scripts'))
    .pipe(browserSync.stream())
})

// Configure the browserSync task and watch file path for change
gulp.task('dev', function browserDev(done) {
  browserSync.init({
    options: {
      reloadDelay: 250
    },
    notify: true,
    proxy: "http://localhost:8080"
  })
  gulp.watch(['./app/styles/scss/*.scss','./app/styles/scss/**/*.scss'], gulp.series('scss', function cssBrowserReload (done) {
    // browserSync.reload()
    done() //Async callback for completion.
  }))
  gulp.watch('./app/scripts/**/*.js', gulp.series('js', function jsBrowserReload (done) {
    browserSync.reload()
    done()
  }))
  gulp.watch(['./wp-content/themes/**/*.php']).on('change', browserSync.reload)
  done()
})

// Default task
gulp.task("default", gulp.series(gulp.parallel('scss', 'js', 'dev')))