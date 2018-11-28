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
         'style/theme/css/plugin/styles.css',
         'style/theme/css/plugin/dtbaker-woocommerce.css',
         'style/theme/css/plugin/woocommerce-layout.css',
         'style/theme/css/plugin/woocommerce-smallscreen.css',
         'style/theme/css/plugin/woocommerce.css',


         'style/theme/css/plugin/socicon.css',
         'style/theme/css/plugin/genericons.css',
         'style/theme/css/plugin/font-awesome.min.css',
         'style/theme/css/system/dashicons.min.css',
         'style/theme/css/plugin/elementor-icons.min.css',
         'style/theme/css/plugin/animations.min.css',
         'style/theme/css/plugin/frontend.min.css',
         'style/theme/css/content/post-20.css',
         'style/theme/css/theme/style.prettyPhoto.css',
         'style/theme/css/theme/style.normalize.css',
         'style/theme/css/theme/style.clearings.css',
         'style/theme/css/theme/style.typorgraphy.css',
         'style/theme/css/theme/style.widths.css',
         'style/theme/css/theme/style.elements.css',
         'style/theme/css/theme/style.forms.css',
         'style/theme/css/theme/style.page_background.css',
         'style/theme/css/theme/style.header_logo.css',
         'style/theme/css/theme/style.navigation.css',
         'style/theme/css/theme/style.accessibility.css',
         'style/theme/css/theme/style.alignments.css',
         'style/theme/css/theme/style.widgets.css',
         'style/theme/css/theme/style.sidebar.css',
         'style/theme/css/theme/style.footer.css',
         'style/theme/css/theme/style.blog.css',
         'style/theme/css/theme/style.content.css',
         'style/theme/css/theme/style.infinite_scroll.css',
         'style/theme/css/theme/style.media.css',
         'style/theme/css/theme/style.plugins.css',
         'style/theme/css/theme/style.cf7.css',
         'style/theme/css/theme/style.color.css',
         'style/theme/css/theme/style.woocommerce.css',
         'style/theme/css/theme/style.layout.css',
         'style/theme/css/content/34ff2b96c4deb0896841c73b9b9f43a7.css'
    ])
		.pipe(concat('stylesheet.css'))
		.pipe(cleanCss())
   .pipe(gulp.dest('style/theme/css'));
});

gulp.task('default', [/*'pack-js', */'pack-css']);