'use strict'

// TODO: Update Token

function http($) {

    var httpService = {
        post: post,
        get: get
    };
    
    //TODO: Get first token
    httpService.token = {};// app.http.get('../token');
    httpService.cachedScriptPromises = {};

    return httpService;

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

    function get(url) {
        deferFactory(function (defer, url) {
            $.get(url, httpService.http.token).then(
                defer.resolve,
                defer.reject)
        });
    };

    function post(url, data) {
        deferFactory(function (defer, url) {
            // TODO: MERGE DATA WITH TOKEN
            $.post(url, data, function (response) {
                defer.resolve(response)
            }).then(defer.resolve,
                defer.reject);
        });
    };
};

module.export = http;