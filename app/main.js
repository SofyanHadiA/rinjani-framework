'use strict'
$app = require('./core/app.js');

// set config here
// $app.$config = {
// 	
// };

// load module here
// $app.$module.register('object' || require('filepath'));

// start the application
$app.start();


// for debuging purpose
global.app = $app

console.log($app);