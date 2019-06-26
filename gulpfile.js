"use strict"

var gulp = require('gulp'),
  sass = require('gulp-sass'),
  del = require('del'),
  uglify = require('gulp-uglify'),
  cleanCSS = require('gulp-clean-css'),
  rename = require("gulp-rename"),
  merge = require('merge-stream'),
  htmlreplace = require('gulp-html-replace'),
  autoprefixer = require('gulp-autoprefixer'),
  browserSync = require('browser-sync').create()

// // Clean task
// gulp.task('clean', function() {
//   return del(['wp-content/themes/hypetur/', 'style.css'])
// })

// // Copy third party libraries from node_modules into /vendor
// gulp.task('vendor:js', function() {
//   return gulp.src([
//     './node_modules/bootstrap/dist/js/*',
//     './node_modules/jquery/dist/*',
//     '!./node_modules/jquery/dist/core.js',
//     './node_modules/popper.js/dist/umd/popper.*'
//   ])
//     .pipe(gulp.dest('./assets/js/vendor'))
// })

// // Copy font-awesome from node_modules into /fonts
// gulp.task('vendor:fonts', function() {
//   return  gulp.src([
//     './node_modules/font-awesome/**/*',
//     '!./node_modules/font-awesome/{less,less/*}',
//     '!./node_modules/font-awesome/{scss,scss/*}',
//     '!./node_modules/font-awesome/.*',
//     '!./node_modules/font-awesome/*.{txt,json,md}'
//   ])
//     .pipe(gulp.dest('./assets/fonts/font-awesome'))
// })

// // vendor task
// gulp.task('vendor', gulp.parallel('vendor:fonts', 'vendor:js'))

// Copy vendor's js to /dist
// gulp.task('vendor:build', function() {
//   var jsStream = gulp.src([
//     './assets/js/vendor/bootstrap.bundle.min.js',
//     './assets/js/vendor/jquery.slim.min.js',
//     './assets/js/vendor/popper.min.js'
//   ])
//     .pipe(gulp.dest('./dist/assets/js/vendor'))
//   var fontStream = gulp.src(['./assets/fonts/font-awesome/**/*.*']).pipe(gulp.dest('./dist/assets/fonts/font-awesome'))
//   return merge (jsStream, fontStream)
// })

// // Copy Bootstrap SCSS(SASS) from node_modules to /assets/scss/bootstrap
// gulp.task('bootstrap:scss', function() {
//   return gulp.src(['./node_modules/bootstrap/scss/**/*'])
//     .pipe(gulp.dest('./assets/scss/bootstrap'))
// })

// Compile SCSS(SASS) files
gulp.task('scss', function compileScss() {
  return gulp.src(['./app/styles/scss/init.scss'])
    .pipe(sass.sync({
      outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe(rename('style.css'))
    .pipe(autoprefixer())
    .pipe(gulp.dest('./wp-content/themes/hypetur'))
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

// Minify Js
gulp.task('js', function () {
  return gulp.src(['app/scripts/src/_includes/**/*.js', 'app/scripts/src/**/*.js'])
    .pipe(uglify())
    .pipe(rename('app.js'))
    .pipe(gulp.dest('./wp-content/themes/hypetur/scripts'))
    .pipe(browserSync.stream())
})

// // Replace HTML block for Js and Css file upon build and copy to /dist
// gulp.task('replaceHtmlBlock', function () {
//   return gulp.src(['*.html'])
//     .pipe(htmlreplace({
//       'js': 'assets/js/app.min.js',
//       'css': 'assets/css/app.min.css'
//     }))
//     .pipe(gulp.dest('dist/'))
// })

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
    browserSync.reload()
    done() //Async callback for completion.
  }))
  gulp.watch('./app/scripts/src/**/*.js', gulp.series('js', function jsBrowserReload (done) {
    browserSync.reload()
    done()
  }))
  gulp.watch(['*.php']).on('change', browserSync.reload)
  done()
})

// Default task
gulp.task("default", gulp.series(gulp.parallel('scss', 'js', 'dev')))