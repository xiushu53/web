var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var browserSync = require('browser-sync');

var paths = {
  'scss': './src/',
  'css': './dist/'
}

//CSSプリプロセッサ
gulp.task("compileCss", function() {
  return gulp.src(paths.scss + "/*.scss")
    .pipe(plumber())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(autoprefixer(['last 3 versions']))
    .pipe(rename({extname: '.css'}))
    .pipe(gulp.dest(paths.css))
});

//簡易Webサーバー
gulp.task('webserver', function() {
  browserSync({
      server: {
          baseDir: "./dist/",
          index: "index.html"
      }
  });
});

//ブラウザリロード
gulp.task('browser-reload', function(){
  browserSync.reload();
})

// CSSファイルの変更を検知してcompileCssを実行
gulp.task("watch", function () {
  gulp.watch("src/*.scss", ["compileCss","browser-reload"]);
});

// 実行時にはcompileCssしてwatch
gulp.task("default", ["compileCss", "webserver", "watch"]);