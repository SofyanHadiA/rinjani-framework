'use strict'

var $  = require('jquery');
require('bootstrap-notify');

var notify = {
    info: function (message) {
        return $.notify(
            { icon: 'fa fa-info-circle', message: message },
            { type: 'info', z_index: 1100 });
    },
    warning: function (message) {
        return $.notify(
            { icon: 'fa fa-exclamation', message: message },
            { type: 'warning', z_index: 1100 });
    },
    danger: function (message) {
        return $.notify(
            { icon: 'fa fa-warning', message: message },
            { type: 'danger', z_index: 1100 });
    }
}

module.exports = notify; 