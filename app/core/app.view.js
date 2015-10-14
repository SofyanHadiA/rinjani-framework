var $ = jQuery;
var $handlebars = require('handlebars');
var $language = require('./../language/en.js');

function viewModule() {

        var self = {
                render: render
        }

        return self;

        function render(template, model, viewContainer) {
                var rendered = $handlebars.compile(template);

                model = $.extend(model, $language);

                rendered = rendered(model);

                if (viewContainer) {
                        $(viewContainer).html(rendered);
                }

                return rendered;
        }
}

module.exports = viewModule();