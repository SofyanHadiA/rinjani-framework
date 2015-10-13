/*
 * App Form Module 
 */

require('../../node_modules/jquery-validation/dist/jquery.validate.js');

module.exports = $injector.resolve(['$'], function ($) {

    var form = {
        create: create,
        config: config,
        onSubmit: onSubmit
    };

    return form;

    function create(formContainer) {
        form.container = formContainer || "#modal-form-" + (Math.random() + 1).toString(36).substring(7),
        $(form.container).validate({
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
        })

        return form;
    };

    function config(config) {
        $.extend(form.validation.settings, config);
        return form;
    };

    function onSubmit(callBack) {
        form.validation.settings.submitHandler = callBack;
        return form;
    };
});

