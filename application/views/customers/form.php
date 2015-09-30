<script>
    'use strict';
    $(function () {
        $('#customer_form').validate({
            rules: {
                first_name: {
                    minlength: 3,
                    required: true
                },
                last_name: {
                    minlength: 3,
                    required: true
                },
                email: {
                    email: true
                }
            },
            messages: {
                first_name: "<?php echo $this->lang->line('common_first_name_required'); ?>",
                last_name: "<?php echo $this->lang->line('common_last_name_required'); ?>",
                email: "<?php echo $this->lang->line('common_email_invalid_format'); ?>"
            },
            errorClass: "error text-red",
            errorPlacement: function(error, element) {         
                error.insertBefore(element);
            },
            highlight: function (element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                element.addClass('valid').closest('.control-group').removeClass('error').addClass('success');
            },
            submitHandler: function (form) {                
                $(form).submit(function (event) {
                        event.preventDefault();

                        var url = $(this).attr('action');
                        var data = $(this).serialize();

                        $.post(url, data, function (response) {                                                      
                            if (response['success']) {
                                $('#add-data-modal').modal('hide');
                                customers.tableGrid.ajax.reload();
                                
                                app.notify.info(response['message']);
                            }
                            else {
                                 app.notify.warning(response['message']);                                
                            }
                        });
                    }
                );
            }
        });
    });
</script>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo $this->lang->line("customers_basic_information"); ?></h4>
</div>

<div class="modal-body">
    <?php echo form_open('customers/save/' . $person_info->person_id,
        array('name' => 'customer_form', 'id' => 'customer_form', "class" => 'form-horizontal')); ?>
    <span class="small"><?php echo $this->lang->line('common_fields_required_message'); ?></span>

    <ul id="error_message_box" class="warning"></ul>

    <fieldset id="customer_basic_info">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo form_label($this->lang->line('customers_account_number'), 'account_number',
                        array('class' => 'col-sm-4 control-label')); ?>
                    <div class='col-sm-8'>
                        <?php echo form_input(array(
                                'name' => 'account_number',
                                'id' => 'account_number',
                                'class' => 'form-control',
                                'value' => $person_info->account_number)
                        ); ?>
                    </div>
                </div>
            </div>

            <?php $this->load->view("people/form_basic_info"); ?>

            <div class="col-sm-6">
                <div class="form-group">
                    <?php echo form_label($this->lang->line('customers_taxable'), 'taxable', array('class' => 'col-sm-4 control-label')); ?>
                    <div class='col-sm-8'>
                        <div class="checkbox">
                            <label>
                                <?php echo form_checkbox('taxable', '1', $person_info->taxable == '' ? TRUE : (boolean)$person_info->taxable); ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </fieldset>
    <?php
    echo form_close();
    ?>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" form="customer_form" class="btn btn-primary">Save changes</button>
</div>

