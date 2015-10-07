'use strict';

app.controller.dashboardController = function () {
    var dashboard = {};

    dashboard.title = app.language.dashboard.title;
    dashboard.description = app.language.dashboard.description;
    dashboard.delete = app.language.delete;
    dashboard.load = onLoad;

	return dashboard;

    function onLoad() {
		$.get("../home/dashboard", function (response) {
			try {
				if (response.success) {
					var template = app.template.dashboardContent; 

                    var rendered = Handlebars.compile(template);
                    rendered = rendered(response)

					console.log(response);

                    $('dashboard-content').html(rendered);

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
