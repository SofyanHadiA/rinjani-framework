var $ = require('jquery');

module.exports = function ($, $language, $notify, $handlebars) {

    var dashboard = {
		load: onLoad
	};

	return dashboard;

    function onLoad() {
		$.get("../home/dashboard", function (response) {
			var hash = location.hash.replace(/^#/, '');

			try {
				if (response.success) {
					var template = require('./dashboard/dashboard.template.js');

                    var rendered = $handlebars.compile(template);
                    rendered = rendered(response)
                    $('dashboard-content').html(rendered); // TODO: make function: 	$('dashboard-content').render(template)									

				} else {
					$notify.danger(response.message);
				}
			}
			catch (e) {
				$notify.danger("Error on load page " + hash + "<br/>" + e);
			}
		});
    }
};
