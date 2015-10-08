'use strict'

// TODO: Update Token

var httpService = function () {

    var httpService = {
        post: post,
        token: token
    };
    

    //TODO: Get first token
    var token = {};// app.http.get('../token');

    var cachedScriptPromises = {};

    var deferFactory = function (requestFunction) {
        var cache = {};
        return function (key, callback) {
            if (!cache[key]) {
                cache[key] = $.Deferred(function (defer) {
                    requestFunction(defer, key);
                }).promise();
            }

            return cache[key].done(callback);
        };
    };

    httpService.get = deferFactory(function (defer, url) {
        $.get(url, app.http.token).then(
            defer.resolve, 
            defer.reject)
    });    

    function post(url, data, callback) {
        // TODO: MERGE DATA WITH TOKEN
        $.post(url, data, function (response) {

            if (response.success) {
                callback(response);
                app.notify.info(response.message);
            }
            else {
                app.notify.warning(response.message);
            }
        }, "json")
            .fail(function (xhr) {
                app.notify.danger("<b>" + xhr.status + "</b>" + " " + xhr.responseJSON.message);
            });
    };

    return httpService;
};

app.http = new httpService();