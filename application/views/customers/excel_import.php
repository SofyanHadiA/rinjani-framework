<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Import customers from Excel sheet</h4>
</div>

<div class="modal-body">
    <?php
    echo form_open_multipart('customers/do_excel_import/', array('id' => 'import_form', 'class' => 'form-horizontal'));
    ?>

    <b>
        <a href="<?php echo site_url('customers/excel'); ?>" class="pull-right">Download Import Excel Template (CSV)</a>
    </b>

    <br class="clearfix"/>

    <ul id="error_message_box"></ul>

    <fieldset id="item_basic_info">
        <div class="form-group">
            <?php echo form_label('File path:', 'name', array('class' => 'col-sm-2 control-label')); ?>
            <div class='col-sm-10'>
                <?php echo form_upload(array(
                        'name' => 'file_path',
                        'id' => 'file_path',
                        'class' => 'form-control',
                        'value' => '')
                );?>
            </div>
        </div>
    </fieldset>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" form="import_form" class="btn btn-primary">
        <?php echo $this->lang->line('common_submit'); ?>
    </button>
</div>

<?php
echo form_close();
?>
<script type='text/javascript'>

    //validation and submit handling
    $(document).ready(function () {
        $('#item_form').validate({
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    success: function (response) {
                        tb_remove();
                        post_person_form_submit(response);
                    },
                    dataType: 'json'
                });

            },
            errorLabelContainer: "#error_message_box",
            wrapper: "li",
            rules: {
                file_path: "required"
            },
            messages: {
                file_path: "Full path to excel file required"
            }
        });
    });
</script>