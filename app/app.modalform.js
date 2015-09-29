'use strict'

app.modalForm = function (url, size, modalId) {

    if(!modalId){
        modalId="modal-container";
    }
    
    $('body').append('<div class="modal fade" id="'+modalId+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
        + '<div class="modal-dialog modal-' + size + '">'
        + '<div class="modal-content">'
        + '</div></div></div>'
    );

    $('#'+modalId).removeData('modal')
        .modal({
            remote: url,
            show: true
        });
        
    $(document).on('hidden.bs.modal', '#'+modalId, function(){
        console.log('hide');
        $('#'+modalId).remove();
    });        
}