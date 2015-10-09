'use strict'

module.exports = function () {

    window.onhashchange = hashchanged;
    
    // Trigger the event (useful on page load).
    hashchanged();

    function hashchanged() {
        var hash = location.hash.replace(/^#/, '')

        if (!hash) {
            hash = app.route.default;
        }

        $('app-view').html('<div class="spinner text-center"><div class="dots-loader">Loading…</div></div>');

        try {
            var controllerName = app.route[hash].controller;

            var controller = app.injector.resolve([controllerName], function () {

                console.log(this);

                return this[controllerName];
            });

            if (app.route[hash].templateUrl) {
                app.http.get(app.route[hash].templateUrl).then(function (response) {
                    var template = response;
                    render(controller, template)
                });
            }
            else {
                var template = app.route[hash].template;
                render(controller, template)
            }

        } catch (e) {
            app.notify.danger("Error on load page " + hash + "<br/>" + e);
        }

        function render(controller, template) {
            var rendered = Handlebars.compile(template);
            rendered = rendered(controller);
            $('app-view').html(rendered);

            controller.load();
        }
    }
};