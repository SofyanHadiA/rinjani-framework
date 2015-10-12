'use strict'

var $ = global.jQuery = require('jquery');

require('bootstrap');

var $config = require('./../config.js');
var $form = require('./app.form.js');
var $loader = require('./app.loader.js');
var $modal = require('./app.modal.js');
var $tablegrid = require('./app.tablegrid.js');
var $notify = require('./app.notify.js');
var $http = require('./app.http.js');
var $module = require('./app.module.js');
var $language = require('./../language/en.js');
var $handlebars = require('handlebars');

var $app = {
    $: $,
    $config: $config,
    $handlebars: $handlebars,
    $form: $form($),
    $modal: $modal($),
    $tablegrid: $tablegrid($modal, $http),
    $notify: $notify($),
    $http: $http,
    $language: $language,
    $module: $module
}

$app.start = function (config) {

    $app.$loader = $loader($, $app.$notify, $app.$http, $app.$handlebars, $app.$module, $app.$config),
    
    // constructor
    window.onhashchange = $app.$loader.load; // $app.$notify, $app.$_http, $.app.$handlebars, $app.$config
    
    $app.$loader.load();

    var app = {
        $config: config || $config,
        $form: $form($config),
        $module: $module
    }

    return app;
}

module.exports = $app;