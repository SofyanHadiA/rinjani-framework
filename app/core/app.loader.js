'use strict'

var $ = require('jquery');

module.exports = function ($notify, $http, $handlebars, $config) {

    var hash = location.hash.replace(/^#/, '');

    if (!hash) {
        hash = $config.route.default;
    };

    $('app-view').html('<div class="spinner text-center"><div class="dots-loader">Loading…</div></div>');

    // try {        
        var controller = $config.route[hash].controller();

        if ($config.route[hash].templateUrl) {
            $http.get($config.route[hash].templateUrl).then(function (response) {
                var template = response;
                render(controller, template)
            });
        }
        else {
            var template = $config.route[hash].template;
            render(controller, template)
        }

    // } catch (e) {
    //     $notify.danger("Error on load page " + hash + "<br/>" + e);
    // }

    function render(model, template) {
        
        var rendered = $handlebars.compile(template);
        rendered = rendered(model);
        $('app-view').html(rendered);
        
        //controller.load();
    }
};