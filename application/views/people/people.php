<script type="text/javascript">
    // enable_email('<?php echo site_url("$controller_name/mailto")?>');

    'use_script';

    var customers = {};

    $(function () {
        var table = '#manage-table ';
        var tableGrid = app.tableGrid(table, "{base_url}customers/get");

        customers.tableGrid = tableGrid.render([
            {
                sortable: false,
                data: 'person_id',
                render: function (data, type, row) {
                    return '<input type="checkbox" id="person_' + row['person_id'] +
                    '" value="' + row['person_id'] + '"/>';
                }
            },
            {data: 'last_name'},
            {data: 'first_name'},
            {data: 'email'},
            {data: 'phone_number'},
            {
                sortable: false,
                data: 'person_id',
                render: function (data, type, row) {
                    return '<div class="btn-group"><a class="btn btn-xs btn-default edit-data" href="{base_url}customers/view/' + data + '">'
                    + '<i class="fa fa-edit"></i></a> '
                    + '<a class="btn btn-xs btn-default btn-delete" href="{base_url}customers/delete/' + data
                    + '"><i class="fa fa-trash"></i></a></div>';
                }
            }
        ]);

        $(table + ' tbody').on('click', '.edit-data', function () {
            event.preventDefault();
            var url = $(this).attr('href');

            app.modalForm(url, 'lg')
        });

        $('#add-data').click(function () {
            event.preventDefault();
            var url = $(this).attr('href');

            app.modalForm(url, 'lg', 'add-data-modal')
        });

        $('#import-excel').click(function () {
            event.preventDefault();
            var url = $(this).attr('href');

            app.modalForm(url, 'md')
        });

        $(table + '#select-all').click(function () {
            if ($(this).prop('checked')) {
                $(table + " tbody :checkbox").each(function () {
                    $(this).prop('checked', true);
                });
            }
            else {
                $(table + " tbody :checkbox").each(function () {
                    $(this).prop('checked', false);
                });
            }
        });

        $(table + " tbody").on("click", '.btn-delete', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            bootbox.confirm('<?php echo $this->lang->line($controller_name."_confirm_delete")?>', function (result) {
                if (result) {
                    tableGrid.delete(url);
                }
            });
        });

        $('#delete-selected').click(function (event) {
            event.preventDefault();
            if ($(table + "tbody :checkbox:checked").length > 0) {
                var url = $("#delete-selected").attr('href');
                bootbox.confirm('<?php echo $this->lang->line($controller_name."_confirm_delete")?>', function (result) {
                    if (result) {
                        tableGrid.delete(url);
                        $(table + '#select-all').prop('checked', false);
                    }
                });
            }
            else {
                $.notify({
                    icon: 'fa fa-warning',
                    message: '<?php echo $this->lang->line($controller_name."_none_selected")?>',
                }, {
                    type: "danger"
                });
            }
        });
    });
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="btn-group">
                            <a href="<?php echo "$controller_name/delete" ?>" id="delete-selected"
                               class="btn btn-sm btn-default">
                                <i class="fa fa-trash"></i>
                                <?php echo $this->lang->line("common_delete") ?>
                            </a>
                            <button class="btn btn-sm btn-default" id="email">
                                <i class="fa fa-send"></i>
                                <?php echo $this->lang->line("common_email"); ?>
                            </button>
                        </div>
                    </div>

                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary" id="add-data"
                           href="<?php echo base_url() . "index.php/" . "$controller_name/view"; ?>"
                           data-target="#modal-container">
                            <i class="fa fa-plus"></i> <?php echo $this->lang->line($controller_name . '_new'); ?>
                        </a>

                        <?php if ($controller_name == 'customers') { ?>
                        <a class="btn btn-success" id="import-excel"
                           href="<?php echo base_url() . "index.php/" . "$controller_name/excel_import"; ?>"
                           data-target="#modal-container">
                            <i class="fa fa-file-excel-o"></i> Excel Import
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="box-body ">
                <table id="manage-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="10px"><input type="checkbox" id="select-all"/></th>
                        <th><?php echo $this->lang->line('common_last_name') ?></th>
                        <th><?php echo $this->lang->line('common_first_name') ?></th>
                        <th><?php echo $this->lang->line('common_email') ?></th>
                        <th><?php echo $this->lang->line('common_phone_number') ?></th>
                        <th width="50px">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div id="feedback_bar"></div>
        </div>
    </div>
</div>