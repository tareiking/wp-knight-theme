// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync({
        proxy: "vagrant.local"
    });

    gulp.watch("sass/*.scss", ['sass']);
    gulp.watch("./*.css").on('change', reload);
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('.'))
        .pipe(reload({stream: true}));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('dist'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch(['sass/*.scss', 'sass/**/*.scss'], ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'serve', 'watch']);
gulp.task('minify', ['lint', 'sass', 'scripts', 'watch']);