var gulp = require('gulp');
var uglify = require('gulp-uglify')
var watch = require('gulp-watch');
var batch = require('gulp-batch');
var less = require('gulp-less');
var path = require('path');

gulp.task('build-less', function() {
  return gulp.src('web/assets/styles/less/*.less')
      .pipe(less({
        paths: [
          '.',
          './node_modules/bootstrap-less'
        ]
      }))
      .pipe(gulp.dest('web/assets/styles'));
});

gulp.task('watch', function () {
    watch('web/assets/styles/less/*.less', batch(function (events, done) {
        gulp.start('build', done);
    }));
});
