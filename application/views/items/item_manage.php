<script>
    'use_script';

    var items = {};

    $(function () {
        var table = '#manage-table ';
        var tableGrid = app.tableGrid(table, "{base_url}items");

        items.tableGrid = tableGrid.render([
            {data: 'item_number'},
            {data: 'name'},
            {data: 'category'},
            {data: 'cost_price'},
            {data: 'unit_price'},
            {data: 'quantity'},
            {data: 'tax_percents'},

        ], 'item_id');
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

                        <a class="btn btn-success" id="import-excel"
                           href="<?php echo base_url() . "index.php/" . "$controller_name/excel_import"; ?>"
                           data-target="#modal-container">
                            <i class="fa fa-file-excel-o"></i> Excel Import
                        </a>
                    </div>
                </div>

                <div class="box-body ">
                    <table id="manage-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10px"><input type="checkbox" id="select-all"/></th>
                            <th><?php echo $this->lang->line('items_item_number') ?></th>
                            <th><?php echo $this->lang->line('items_name') ?></th>
                            <th><?php echo $this->lang->line('items_category') ?></th>
                            <th><?php echo $this->lang->line('items_cost_price') ?></th>
                            <th><?php echo $this->lang->line('items_unit_price') ?></th>
                            <th><?php echo $this->lang->line('items_quantity') ?></th>
                            <th><?php echo $this->lang->line('items_tax_percents') ?></th>
                            <th><?php echo $this->lang->line('items_inventory') ?></th>
                            <th width="50px">Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div id="feedback_bar"></div>
            </div>
        </div>
    </div>