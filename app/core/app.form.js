'use strict'

module.exports = function (formContainer) {

    var form = {
        container: formContainer,         
        config: config,
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

