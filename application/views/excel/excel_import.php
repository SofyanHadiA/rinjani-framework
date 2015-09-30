<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Import customers from Excel sheet</h4>
</div>

<div class="modal-body">
    <?php
    echo form_open_multipart('customers/do_excel_import/', array('id' => 'import_form', 'class' => 'form-horizontal'));
    ?>

    <b><a href="<?php echo site_url('customers/excel'); ?>" class="pull-right">Download Import Excel Template (CSV)</a></b>
    <br class="clearfix"/>
    <ul id="error_message_box"></ul>

    <span class="btn btn-success fileinput-button">
        <i class="fa fa-file-excel-o"></i>
        <span>Select Files</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="file_path">
    </span>

    <label id="file-path">No file selected</label>

    <div id="progress" class="progress top-buffer hide">
        <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
             style="width: 0%;">0%
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>

<?php
echo form_close();
?>

<script type='text/javascript'>
    'use strict';

    $(function () {
        $('#import_form').fileupload({
            dataType: 'json',
            add: function (e, data) {
                var modalFooter = $(".modal-footer");

                if (modalFooter.children('.btn-upload').length <= 0)
                    data.context = $('<button/>')
                        .text('Upload')
                        .addClass('btn btn-primary btn-upload')
                        .appendTo(modalFooter)
                        .click(function () {
                            $(this).remove();
                            $('#progress').removeClass('hide');
                            data.submit();
                        });

                $('#file-path').html(data.files[0].name);
            },
            done: function (e, response) {

                $('#modal-container').modal('hide');

                $('#progress').addClass('hide');
                $('#progress .progress-bar').css('width', '0%').text('0%');

                if (response.result.success) {
                    customers.tableGrid.ajax.reload();
                    $.notify({icon: 'fa fa-info-circle', message: response.result.message}, {type: "info"});
                }
                else {
                    $.notify({icon: 'fa fa-warning', message: response.result.message}, {type: "warning"});
                }
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css('width', progress + '%').text(progress + '%');
            }
        });
    });
</script>