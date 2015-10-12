var controller = require('./customer.controller.js');
var template = require('./customer.template.hbs');
var model = require('./customer.model.js');

module.exports = function ($app) {
	return {
		'controller': controller($app.$, $app.$notify, $app.$tablegrid, $app.$modal, $app.$form),
		'model': model($app.$language),
		'template': template()
	}
};
