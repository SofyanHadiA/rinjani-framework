var homeController = require('./home.controller.js');
var homeTemplate = require('./home.template.js');
var homeModel = require('./home.model.js');

function home($app) {
	return {
		'controller': homeController(),
		'model': homeModel($app.$language),
		'template': homeTemplate
	}
};

module.exports = home;