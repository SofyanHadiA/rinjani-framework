'use strict'

$(function () {

    // Bind the event.
    window.onhashchange = hashchanged;

    // Trigger the event (useful on page load).
    hashchanged();

    function hashchanged() {
        var hash = location.hash.replace(/^#/, '')

        if (hash) {            
            // TODO: Use Spinner
            $('app-view').html('Loading...');       
                 
            $.get(app.route[hash].template, function (response) {
                try {
                    var controller = new app.controller[app.route[hash].controller];                    
                    var template = response;        
                    var rendered = Handlebars.compile(template);                   
                    rendered = rendered(controller)
                    
                    $('app-view').html(rendered);
                    
                    controller.load();
                }
                catch (e) {
                    app.notify.danger("Error on load page " + hash + "<br/>" + e);
                }
            });
        }
        else {
            $('app-view').load(app.route[app.route.default].template);
        }
    }
})
;