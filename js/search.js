"use strict";

$(document).ready(function() {
    $("#search-form").submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var data = form.find('#search-value').val();
        $.post(form.attr('action'), data, function (result) {
            // $(".result").html(data);
            console.log(result);
        });
    });
});