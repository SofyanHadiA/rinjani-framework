'use strict'

// TODO: Update Token

app.http = {};


// TODO: Implement Defer Promise
// $.createCache = function( requestFunction ) {
//     var cache = {};
//     return function( key, callback ) {
//         if ( !cache[ key ] ) {
//             cache[ key ] = $.Deferred(function( defer ) {
//                 requestFunction( defer, key );
//             }).promise();
//         }
//         return cache[ key ].done( callback );
//     };
// };

app.http.get = function(url, data, callback){
    $.get(url, data, function (response) {
        //app.session.token = response.token; <----
        
        if (response.success) {
            callback();
            app.notify.info(response.message);
        }
        else {
            app.notify.warning(response.message);
        }
        
        // TODO: Deffered Promise                
        return response;
        
    }, "json")
    .fail(function(xhr) {                
        app.notify.danger("<b>" + xhr.status +"</b>" + " " +xhr.responseJSON.message);
    });;
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
    }, "json")
    .fail(function(xhr) {                
        app.notify.danger("<b>" + xhr.status +"</b>" + " " +xhr.responseJSON.message);
    });
};