var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCss = require('gulp-clean-css');
 
gulp.task('pack-js', function () {
	return gulp.src(['js/theme/*.js', 'js/theme/content/*.js', 'js/theme/system/*.js'])
		.pipe(concat('app.js'))
		.pipe(minify({
			ext:{
				min:'.js'
			},
			noSource: true
		}))
		.pipe(gulp.dest('js'));
});
 
gulp.task('pack-css', function () {	
	return gulp.src(['style/theme/css/content/*.css', 'style/theme/css/plugin/*.css', 'style/theme/css/system/*.css', 'style/theme/css/theme/*.css'])
		.pipe(concat('stylesheet.css'))
		.pipe(cleanCss())
   .pipe(gulp.dest('style/theme/css'));
});
 
gulp.task('default', [/*'pack-js',*/ 'pack-css']);