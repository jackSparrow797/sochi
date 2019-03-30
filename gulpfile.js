const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');
const inlineCss = require('gulp-inline-css');

gulp.task('sass-compile', function () {
    return gulp.src(['./sass/**/*.sass', './sass/**/*.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./public/css/'))
});

gulp.task('default', function() {
    return gulp.src('./public/mail-templates/simple.html')
        .pipe(inlineCss())
        .pipe(gulp.dest('./public/mail-templates/build/'));
});


gulp.task('watch', function () {
    gulp.watch(['sass/**/*.sass', 'sass/**/*.scss'], gulp.series('sass-compile'))
});