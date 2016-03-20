var gulp = require('gulp'),
    gulpif = require('gulp-if'),
    useref = require('gulp-useref'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    minifyCss = require('gulp-minify-css'),
    copy = require('gulp-copy'),
    del = require('del'),
    merge = require('merge-stream'),
    ngAnnotate = require('gulp-ng-annotate');


gulp.task('minify', ['copy'], function () {
    return gulp.src('app/views/*.ejs')
        .pipe(useref({ searchPath: 'public/'}))
        .pipe(gulpif('*.js', ngAnnotate()))
        .pipe(gulpif('*.js', uglify()))
        .pipe(gulpif('*.css', autoprefixer()))
        .pipe(gulpif('*.css', minifyCss({processImport: false})))
        .pipe(gulp.dest('dist/public/'));
});

gulp.task('copy', ['clean'], function () {
    return gulp.src(['server.js', 'config/*', 'app/**/*', 'node_modules/**/*', 'public/partials/*', 'public/assets/img/**/*', 'public/vendor/Materialize/dist/font/**/*'])
        .pipe(copy('dist/'));
});

gulp.task('moveViews', ['cleanViews'], function () {
    return gulp.src('dist/public/*.ejs')
    .pipe(gulp.dest('dist/app/views'));
});

gulp.task('moveFonts', ['moveViews'],  function () {
    return gulp.src('dist/public/vendor/Materialize/dist/font/**/*')
    .pipe(gulp.dest('dist/public/assets/font'))
});

gulp.task('cleanViews',  ['minify'], function () {
    return del(['./dist/app/views/*.ejs']);
});

gulp.task('cleanFiles', ['moveFonts'], function () {
    return del([
        'dist/public/vendor',
        'dist/public/*.ejs'
      ]);
});

gulp.task('clean', function () {
    return del(['dist2']);
});

gulp.task('default', ['clean' , 'copy' , 'minify', 'moveViews', 'moveFonts', 'cleanFiles']);
