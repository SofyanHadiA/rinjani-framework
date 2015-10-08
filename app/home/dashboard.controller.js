'use strict';

app.controller.dashboardController = function () {
    var dashboard = {};

    dashboard.title = app.language.module_home;    
    dashboard.load = onLoad;

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
