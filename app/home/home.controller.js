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
					var dashboard = require('./dashboard/dashboard.js');

                    var rendered = $handlebars.compile(dashboard.template);
                    rendered = rendered(response)
                    $('dashboard-content').html(rendered);

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
