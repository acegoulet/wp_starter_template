var browserify = require('browserify');
var gulp = require('gulp');
var rename = require('gulp-rename');
var source = require('vinyl-source-stream');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var buffer = require('vinyl-buffer');

var MAIN_JS_FILE = './js/main.js';

gulp.task('scripts', function(){
    var b = browserify();
    b.add(MAIN_JS_FILE);
    return b.bundle()
        .pipe(source('scripts.concat.js'))
        .pipe(rename('js/script.js'))
        .pipe(gulp.dest('./'))
});

gulp.task('scriptsmin', function(){
    return browserify(MAIN_JS_FILE)
        .bundle()
        .pipe(source('scripts.concatmin.js'))
        .pipe(buffer())
        .pipe(uglify())
        .pipe(rename('js/script-min.js'))
        .pipe(gulp.dest('./'));
});

gulp.task('sass', function(){
  gulp.src('./sass/style.scss')
    .pipe(sass())
    .pipe(gulp.dest('./'))
})

gulp.task('default', function() {
    gulp.start(['scripts', 'scriptsmin', 'sass']);
    gulp.watch(['./js/**/*.js'], ['scripts', 'scriptsmin']);
    gulp.watch(['./sass/**/*.scss', './sass/**/*.css'], ['sass']);
});