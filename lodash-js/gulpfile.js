var gulp        = require("gulp"),
    connect     = require('gulp-connect'),
    babel       = require("gulp-babel");

var watchList = [
    'public/index.html',
    'public/template/*.htm',
    'public/dist/*.css',
    'public/dist/*.js',
    'public/dist/**/*.js',
];

// listen
gulp.task('connect', function() {
    connect.server({
        root: './public/',
        livereload: true
    });
});

gulp.task('list', function () {
    gulp.src(watchList)
        .pipe(connect.reload());
});
gulp.task('watch', function () {
    gulp.watch( watchList, ['list']);
});

/**
 *  to assets folder
 *  not watch
 */
gulp.task('toAssets', function () {
    gulp.src('./node_modules/babel-core/browser.*') .pipe(gulp.dest("public/assets/babel-core/"));
    gulp.src('./node_modules/bootstrap/dist/**')    .pipe(gulp.dest("public/assets/bootstrap/"));
    gulp.src('./node_modules/jquery/dist/*')        .pipe(gulp.dest("public/assets/jquery/"));
    gulp.src('./node_modules/lodash/lodash.js')     .pipe(gulp.dest("public/assets/lodash/"));
    
});

// --------------------------------------------------------------------------------
gulp.task('default', function() {
    console.log('---- start ----');
    gulp.run('connect', 'watch', 'toAssets');
});


