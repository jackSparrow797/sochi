const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');

gulp.task('sass-compile', function () {
    return gulp.src(['./sass/**/*.sass', './sass/**/*.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./public/css/'))
});

gulp.task('watch', function () {
    gulp.watch(['sass/**/*.sass', 'sass/**/*.scss'], gulp.series('sass-compile'))
});