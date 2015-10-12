'use strict'

var $app = require('./core/app.js');

// for debuging purpose
global.app = $app

console.log($app);

// set config here
// $app.$config = {
// 	
// };

// load module here
$app.$module.register('home', require('./home/home.js')($app));
$app.$module.register('customers', require('./customer/customer.js')($app));

// start the application
$app.start();