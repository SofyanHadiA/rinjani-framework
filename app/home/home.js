function home($app) {
	return {
		'controller': require('./home.controller.js')(),
		'model': homeDi.resolve('homeModel'),
		'template': homeDi.resolve('homeTemplate')
	}
};

module.exports = home;