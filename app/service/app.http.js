'use strict'

app.http = {};

app.http.post = function(url, data, callback){
    $.post(url, data, function (response) {
        callback();
        if (response.success) {
            app.notify.info(response.message);
        }
        else {
            app.notify.warning(response.message);
        }
    }, "json");
};