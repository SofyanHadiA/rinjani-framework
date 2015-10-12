'use strict'

module.exports = function ($) {

    var modal = {
        show: show
    };

    return modal;

    function show(url, size, modalId) {       
        var defer = $.Deferred
        
        modalId = modalId || "modal-container-" + (Math.random() + 1).toString(36).substring(7);

        $('body').append('<div class="modal fade" id="' + modalId + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
            + '<div class="modal-dialog modal-' + size + '">'
            + '<div class="modal-content">'
            + '</div></div></div>'
            );

        $('#' + modalId).removeData('modal')
            .modal({
                remote: url,
                show: true
            });

        $(document).on('hidden.bs.modal', '#' + modalId, function () {
            console.log('hide '+modalId);
            $('#' + modalId).remove();
            
            defer.done();
        });

        return defer.promise();
    };
}