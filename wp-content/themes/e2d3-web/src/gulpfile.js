var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');

var paths = {
  'scss': './',
  'css': '../'
}

//CSSプリプロセッサ
gulp.task("compileCss", function() {
  return gulp.src(paths.scss + "/*.scss")
    .pipe(plumber())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(autoprefixer(['last 3 versions']))
    .pipe(gulp.dest(paths.css))
});

// CSSファイルの変更を検知してcompileCssを実行
gulp.task("watch", function () {
  gulp.watch(paths.scss + "/*.scss", ["compileCss"]);
});

// 実行時にはcompileCssしてwatch
gulp.task("default", ["compileCss", "watch"]);