'use strict'

var $ = global.jQuery = require('jquery');
require('../../node_modules/jquery-validation/dist/jquery.validate.js');
var $config = require('./../config.js');

module.exports = function ($config, formContainer) {

    var form = {
        container: formContainer || "#modal-form",         
        config: config,
        validation: validation,
        onSubmit: onSubmit
    };
    
    form.validation();
        
    return form;

    function validation() {
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
};

