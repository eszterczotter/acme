(function(){
    "use strict";

    module.exports = function (environment, globals){
        this[environment]   = true;             // sets the environment
        this.bitwise        = true;             // don't use bitwise operators
        this.curly          = true;             // add curly braces to blocks
        this.eqeqeq         = true;             // use the strict equals operator
        this.es3            = true;             // adhere to EcmaScript 3
        this.forin          = true;             // check for property ownership in for in loops
        this.freeze         = true;             // do not ovverride native objects
        this.funcscope      = false;            // don't use variables out of their blocks of definition
        this.futurehostile  = true;             // do not override future objects
        this.globals        = globals || {};    // global variables
        this.globalstrict   = false;            // use strict inside a function
        this.iterator       = false;            // do not use __iterator__ property
        this.maxcomplexity  = 5;                // max cyclomatic complexity
        this.maxdepth       = 1;                // use max one level of nesting within a function
        this.maxerr         = 1;                // fails fast
        this.maxparams      = 3;                // use max 3 parameters in a function
        this.maxstatements  = 0;                // use unlimited number of statements in a function
        this.latedef        = true;             // do not use variable before definition
        this.noarg          = true;             // don't use arguments.calller
        this.nocomma        = true;             // don't use the comma operator
        this.nonbsp         = true;             // warn about Mac non-breaking-space character
        this.nonew          = true;             // don't use new for side-effects
        this.notypeof       = false;            // checks for `typeof` spelling errors
        this.shadow         = 'outer';          // don't shadow variables
        this.singleGroups   = true;             // don't use parentheses when not necessary
        this.undef          = true;             // don't use undeclared variables
        this.unused         = true;             // don't declare unused variables
        this.asi            = false;            // use semicolons
        this.boss           = false;            // don't assign variables in comparisons (or use parentheses)
        this.debug          = false;            // don't use debugger statement
        this.elision        = false;            // don't use extra commas in arrays
        this.eqnull         = false;            // don't check for `undefined` via `== null`
        this.esnext         = false;            // don't use EcmaScript 6
        this.evil           = false;            // don't use `eval`
        this.expr           = false;            // don't use expressions instead of assignments
        this.lastsemic      = false;            // won't allow missing semicolon in last statement
        this.loopfunc       = false;            // don't declare functions inside loops
        this.moz            = false;            // don't use mozilla javascript extension
        this.noyield        = false;            // use `yield` in generator functions
        this.phantom        = false;            // don't use PhantomJS
        this.plusplus       = false;            // don't use ++ and -- operators
        this.proto          = false;            // don't use the __proto__ property
        this.scripturl      = false;            // don't use script-targeted url-s
        this.strict         = true;             // `use strict`
        this.supernew       = false;            // don't use weird constructions
        this.validthis      = false;            // validates this usages
        this.withstmt       = false;            // don't use `with`
    };

}());