/*
* Application core object
*/

// Load jQuery and register it to globl and load bootstrap
var $ = global.jQuery = require('jquery');
require('bootstrap');

// Load core modules
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
// End load core modules

// Core application instance
var $app = {
    
    // register module
    $:$,
    $config: $config,
    $handlebars: $handlebars,
    $form: $form,
    $modal: $modal,
    $loader: $loader,
    $tablegrid: $tablegrid,
    $notify: $notify,
    $http: $http,
    $language: $language,
    $module: $module,

    // Start application and bund url cahnages to loader
    start: function (config) {
        // merge default application config with custom comfig
        $app.$config = $.extend($app.$config, config);
        
        // bind loader to window on hash change
        window.onhashchange = $app.$loader.load;
        
        // load default controller
        $app.$loader.load($app.$config );

        return $app;
    }
}

module.exports = $app;