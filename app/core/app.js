'use strict'

var $ = global.jQuery = require('jquery');

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
    $config: $config,
    $handlebars: $handlebars,
    $form: $form,
    $loader: $loader,
    $modal: $modal,
    $tablegrid: $tablegrid,
    $notify: $notify,
    $http: $http,
    $language: $language,
    $module: $module
}

$app.start = function (config) {
    window.onhashchange = $app.$loader($app.$notify, $app.$http, $app.$handlebars, $app.$config);
    this.$config = config || $config;  
    
    // inisiate the all the module here 
}

module.exports = $app;