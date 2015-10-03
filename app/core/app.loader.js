'use strict'

$(function () {

    // Bind the event.
    window.onhashchange = hashchanged;

    // Trigger the event (useful on page load).
    hashchanged();

    function hashchanged() {
        var hash = location.hash.replace(/^#/, '')

        if (hash) {

            $.get(app.route[hash].template, function (response) {
                try {
                    $('app-view').html('');
                    var controller = new app.controller[app.route[hash].controller];

                    var pattern = /\{\{(.*?)\}\}/g;
                    var result = response;

                    for(var parsed = pattern.exec(result); parsed; parsed = pattern.exec(result)){
                        result = result.replace('{{'+parsed[1]+'}}', controller[parsed[1]]);
                    }

                    $('app-view').html(result);

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