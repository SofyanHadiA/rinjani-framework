module.exports = di.inject(function ($, $language, $notify, $handlebars) {
	this.load = onLoad;
	return this;

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
});