var gulp = require('gulp');
//var uglify = require('gulp-uglify')
var watch = require('gulp-watch');
var batch = require('gulp-batch');
var less = require('gulp-less');
var browserify = require('browserify');
var transform = require('vinyl-transform');

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
gulp.task('bundle-js',function(){

  return gulp.src('web/assets/js/*.js')
  .pipe(transform(function(filename) {
    return browserify(filename).bundle();
    }))
  .pipe(gulp.dest('web/assets/js/dist/'))
});



gulp.task('watch', function () {
    watch('web/assets/styles/less/*.less', batch(function (events, done) {
        gulp.start('build-less', done);
    }));
});
