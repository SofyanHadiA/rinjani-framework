'use strict';

var $ = require('jquery');

module.exports = function ($, $language) {
	
    var dashboard = {
		title: $language.module_home,
		load: onLoad
	};

	return dashboard;

    function onLoad() {
		$.get("../home/dashboard", function (response) {
			try {
				if (response.success) {
					var template = app.template.dashboardContent;
                    var rendered = Handlebars.compile(template);
                    rendered = rendered(response)
                    $('dashboard-content').html(rendered); // TODO: make function: 	$('dashboard-content').render(template)									

				} else {
					app.notify.danger(response.message);
				}
			}
			catch (e) {
				app.notify.danger("Error on load page " + hash + "<br/>" + e);
			}
		});
    }
};
