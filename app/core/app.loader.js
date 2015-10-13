'use strict'

module.exports = function ($, $notify, $http, $handlebars, $module, $config) {

    var loader = {
        load: load
    }

    return loader;

    function load() {
        var hash = location.hash.replace(/^#/, '');

        if (!hash) {
            hash = $config.route.default;
        };

        $('app-view').html('<div class="spinner text-center"><div class="dots-loader">Loading…</div></div>');

        // try {
            var _module = $module.resolve(hash);

            var model = _module.model;

            if (_module.templateUrl) {
                $http.get(_module.templateUrl).then(function (response) {
                    var template = response;
                    render(model, template)

                    _module.controller.load()
                });
            }
            else {
                var template = _module.template;
                render(model, template)

                _module.controller.load()
            }

        // } catch (e) {
        //     $notify.danger("Error on load page " + hash + "<br/>" + e);
        // }

        function render(model, template) {

            var rendered = $handlebars.compile(template);
            rendered = rendered(model);
            $('app-view').html(rendered);
        }
    };
};