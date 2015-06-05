(function(){
    "use strict";

    exports.gulp = require('gulp');
    exports.util = require('gulp-util');
    exports.jshint = require('gulp-jshint');
    exports.codeception = require('gulp-codeception');
    exports.JsHintOptions = require('./js-hint-options');
    exports.phplint = require('phplint').lint;
    exports.phpcs = require('gulp-phpcs');
    exports.php = require('gulp-connect-php');
    exports.phpspec = require('gulp-phpspec');
    exports.args = require('minimist')(process.argv.slice(2));
    exports.readPackage = require('read-package-json');

}());