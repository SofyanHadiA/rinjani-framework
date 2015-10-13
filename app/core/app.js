'use strict'

var $ = global.jQuery = require('jquery');
require('bootstrap');


var $config = require('./app.config_default.js');
var $form = require('./app.form.js');
var $loader = require('./app.loader.js');
var $modal = require('./app.modal.js');
var $tablegrid = require('./app.tablegrid.js');
var $notify = require('./app.notify.js');
var $http = require('./app.http.js');
var $module = require('./app.module.js');
var $language = require('./../language/en.js');
var $handlebars = require('handlebars');

di.register('$').instance($);
di.register('$handlebars').instance($handlebars);
di.register('$form').as($form);
di.register('$modal').as($modal);
di.register('$tablegrid').as($tablegrid);
di.register('$notify').as($notify);
di.register('$http').instance($http);
di.register('$language').instance($language);
di.register('$module').instance($module);

var $app = {
    di: di,
    $: $,
    $config: $config,
    $handlebars: $handlebars,
    $form: di.resolve('$form'),
    $modal: $modal($),
    $tablegrid: $tablegrid($modal, $http),
    $notify: $notify($),
    $http: $http,
    $language: $language,
    $module: $module,
}

$app.start = function (config) {
    $app.$config = $.merge($app.$config, config);
    $app.$loader = $loader($, $app.$notify, $app.$http, $app.$handlebars, $app.$module, config),    
    window.onhashchange = $app.$loader.load; 
    
    $app.$loader.load();

    return $app;
}

module.exports = $app;