'use strict'

app.http = {};

app.http.get = function(url, data, callback){
    $.get(url, data, function (response) {
        if (!response.success) {
            app.notify.warning(response.message);
        }
        else {
            callback();
        }
    }, "json");
};

app.http.post = function(url, data, callback){
    $.post(url, data, function (response) {

        if (response.success) {
            callback();
            app.notify.info(response.message);
        }
        else {
            app.notify.warning(response.message);
        }
    }, "json");
};