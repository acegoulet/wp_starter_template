var browserify = require('browserify');
var gulp = require('gulp');
var rename = require('gulp-rename');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var buffer = require('vinyl-buffer');
var order = require("gulp-order");
var concat = require("gulp-concat");

/* EXAMPLE with dependencies:
var js_files = [
    './js/vendor/validate.js',
    './js/site-scripts/site-scripts.js'
];
*/

var js_files = [
    './js/site-scripts/site-scripts.js'
];

gulp.task('scriptsmin', function() {
    gulp.src(js_files)
    .pipe(concat('script-min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./js'));
});

gulp.task('sass', function(){
  gulp.src('./sass/style.scss')
    .pipe(sass())
    .pipe(gulp.dest('./'))
})

gulp.task('default', function() {
    gulp.start(['scriptsmin', 'sass']);
    gulp.watch(['./js/**/*.js'], ['scriptsmin']);
    gulp.watch(['./sass/**/*.scss', './sass/**/*.css'], ['sass']);
});