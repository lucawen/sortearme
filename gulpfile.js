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
        .pipe(gulpif('*.css', minifyCss()))
        .pipe(gulp.dest('dist/'));
});

gulp.task('copy', ['clean'], function () {
    return gulp.src(['server.js', 'config/*', 'app/**/*', 'node_modules/**/*', 'public/partials/*'])
        .pipe(copy('dist/'));
});

gulp.task('moveViews', ['cleanViews'], function () {
    return gulp.src('dist/*.ejs')
    .pipe(gulp.dest('dist/app/views'));
});

gulp.task('moveAssets', ['moveViews'],  function () {
    var cssMin = gulp.src('dist/css/*')
        .pipe(gulp.dest('dist/public/css'));

    var jsMin = gulp.src('dist/js/*')
        .pipe(gulp.dest('dist/public/js'));

     return merge(cssMin, jsMin);
});

gulp.task('cleanViews', ['minify'], function () {
    return del(['./dist/app/views/*.ejs']);
});

gulp.task('cleanFiles', ['moveAssets'], function () {
    return del([
        'dist/css/',
        'dist/js/',
        'dist/*.ejs'
      ]);
});


gulp.task('clean', function () {
    return del(['dist']);
});

gulp.task('default', ['clean' , 'copy' , 'minify', 'moveViews', 'moveAssets', 'cleanFiles']);
