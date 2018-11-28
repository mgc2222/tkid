var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCss = require('gulp-clean-css');
 
gulp.task('pack-js', function () {
	return gulp.src([
	    'js/theme/content/53cf86c741e21951c726ebe800a3241e.js',
        'js/theme/jquery.cookie.min.js',
        'js/theme/system/core.min.js',
        'js/theme/javascript.js',
        'js/theme/navigation.js',
        'js/theme/skip-link-focus-fix.js',
        'js/theme/jquery.prettyPhoto.min.js',
        'js/theme/jquery.prettyPhoto.init.min.js',
        'js/theme/slick.min.js',
        'js/theme/waypoints.min.js',
        'js/theme/frontend.min.js',
    ])
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
	return gulp.src([
	    'style/theme/css/content/*.css',
        'style/theme/css/plugin/*.css',
        'style/theme/css/system/*.css',
        'style/theme/css/theme/*.css'
    ])
		.pipe(concat('stylesheet.css'))
		.pipe(cleanCss())
   .pipe(gulp.dest('style/theme/css'));
});

gulp.task('default', [/*'pack-js', */'pack-css']);