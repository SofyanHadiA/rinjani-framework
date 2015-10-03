'use strict'

app.form = function (container) {

    var form = {};

    // Default configuration
    form.validation = $(container).validate({
        errorClass: "error text-red",
        errorPlacement: function (error, element) {
            error.insertBefore(element);
        },
        highlight: function (element) {
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.addClass('valid').closest('.control-group').removeClass('error').addClass('success');
        },
    });

    form.config = function (config) {
        $.extend(form.validation.settings, config);
        return form;
    };

    form.onSubmit = function (call) {
        form.validation.settings.submitHandler = call;
        return form;
    };

    return form;
};

