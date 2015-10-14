/*
 * Application Form Core Module 
 */

var $ = jQuery;
require('../../node_modules/jquery-validation/dist/jquery.validate.js');

var formModule = function () {

    var form = {
        create: create,
        config: config,
        onSubmit: submit
    };

    return form;

    function create(formId) {
        form.container = formId
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

    function submit(callBack) {
        form.validation.settings.submitHandler = callBack;
        return form;
    };
};


module.exports = formModule();
