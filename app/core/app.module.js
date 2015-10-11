'use strict';

var $module = {
    modules: {},
    register: function (key, value) {
        this.modules[key] = value;
    },
    resolve: function (deps, func, scope) {
        var args = [];
        scope = scope || {};
        for (var i = 0; i < deps.length, d = deps[i]; i++) {
            if (this.modules[d]) {
                scope[d] = this.modules[d];
            } else {
                throw new Error('Can\'t resolve ' + d);
            }
        }
        return function () {
            func.apply(scope || {}, Array.prototype.slice.call(arguments, 0));
        }
    }
};

module.exports = $module;