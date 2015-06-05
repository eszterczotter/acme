(function(){
    "use strict";

    var $ = require('./build/gulp');

    var phpFiles = [
        '**/*.php',
        '!vendor/**/*.php',
        '!node_modules/**/*.php'
    ];

    var jsFiles = [
        '**/*.js',
        '!node_modules/**/*.js',
        '!vendor/**/*.js'
    ];

    $.gulp.task('default', ['lint:js', 'integration'], function(){

        return $.php.closeServer(function(){
            pass('Build passed');
        });

    });

    $.gulp.task('integration', ['unit', 'server'], function(){

        return $.gulp.src('codeception.yml')
            .pipe($.codeception('./vendor/bin/codecept', {flags: ' -f -q', notify: true}))
            .on('error', function(){
                fail('Integration tests failed');
            });

    });

    $.gulp.task('unit', ['psr2'], function(){
        return $.gulp.src('phpspec.yml').pipe($.phpspec('./vendor/bin/phpspec', {quiet: true, notify: true}))
            .on('error', function(){
                fail('Unit tests failed');
            });
    });

    $.gulp.task('psr2', ['lint:php'], function(){

        var files = phpFiles.concat([
            '!tests/**/*.php'
        ]) ;

        return $.gulp.src(files)
            .pipe($.phpcs({
                bin: 'vendor/bin/phpcs',
                standard: 'PSR2',
                errorSeverity: 1,
                warningSeverity: 1,
                colors: true
            }))
            .pipe($.phpcs.reporter('log'))
            .pipe($.phpcs.reporter('fail'))
            .on('error', function(){
                fail('PSR-2 failed.');
            });
    });

    $.gulp.task('lint:php', function() {

        return $.phplint(phpFiles,
            {limit: 1, stdout: false, stderr: false},
            function (error) {
                if (error) {
                    fail(['PHP Lint failed', error.message]);
            }
        });

    });

    $.gulp.task('lint:js', function(){

        return $.gulp.src(jsFiles)
            .pipe($.jshint(new $.JsHintOptions('node')))
            .pipe($.jshint.reporter('default'))
            .pipe($.jshint.reporter('fail'))
            .on('error', function(){
                fail('JavasScript Lint failed');
            });

    });

    $.gulp.task('server', function(){
        return $.php.server({
            port: 8000,
            hostname: 'localhost',
            router: 'server.php'
        });
    });

    $.gulp.task('bump', function(){
        var bump = $.args.v || 'patch';

        console.log(bump);
    });

    function fail(messages){

        return $.php.closeServer(function(){
            log(messages, 'red');
            process.exit(1);
        });

    }

    function pass(messages){
        log(messages, 'green');
    }

    function log(messages, color)
    {
        if(messages instanceof Array) {
            messages.forEach(function(message){
                log(message, color);
            });
        } else {
            $.util.log($.util.colors[color](messages));
        }
    }

}());