var homeController = require('./home.controller.js');

function home($app) {
	return {
		'controller': homeController($app.$, $app.$language),
		'model': [
			{
				name: "homeModel"
			}
		],
		'template':  '<section class="content-header"></section>' +
				'<section class="content">' +
					'<div class="row">' +
					'<h1>{{title}}</h1>'+
						'<div class="col-md-12">' +
							'<div class="box">' +
								'<div class="box-body">' +
									'<dashboard-content/>' +
								'</div>' +
							'</div>' +
						'</div>' +
					'</div>' +
				'</section>'
	}
};

module.exports = home;