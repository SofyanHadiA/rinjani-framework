<script type="text/javascript">
    // enable_email('<?php echo site_url("$controller_name/mailto")?>');

    'use_script';

    var customers = {};

    $(function () {
        var table = '#manage-table ';
        var tableGrid = app.tableGrid(table, "{base_url}customers");

        customers.tableGrid = tableGrid.render([
            {data: 'last_name'},
            {data: 'first_name'},
            {data: 'email'},
            {data: 'phone_number'}
        ], 'person_id');
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
                        <?php } ?>
                    </div>
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
<script>
    app.loader.load('{base_url}customers/get');
    
    $('app-view').load('{base_url}customers/get');
</script>
<app-view/>