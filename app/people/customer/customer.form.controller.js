'use strict'

app.controller.customerFormController = function () {

    var controller = {
        load: onLoad
    };

    return controller;

    var formConfig = {
        rules: {
            first_name: {
                minlength: 3,
                required: true
            },
            last_name: {
                minlength: 3,
                required: true
            },
            email: {
                email: true
            }
        }
    };

    function onLoad() {
        var form = "#customer_form";
        app.form(form)
            .config(formConfig)
            .onSubmit(function () {
                var url = $(form).attr('action');
                var data = $(form).serialize();
                app.http.post(url, data, function () {
                    $('#modal-container').modal('hide');
                    app.controller.customerController.tableGrid.ajax.reload();
                });
            });
    }
};
