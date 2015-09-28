'use strict'

app.modalForm = function (url, size) {

    $('#modal-container').remove();
    $('body').append('<div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
        + '<div class="modal-dialog modal-' + size + '">'
        + '<div class="modal-content">'
        + '</div>'
        + '</div>'
        + '</div>'
    );

    $('#modal-container').removeData('modal')
        .modal({
            remote: url,
            show: true
        });
}