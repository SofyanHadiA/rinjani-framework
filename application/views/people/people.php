<script type="text/javascript">
    /*    $(document).ready(function () {
     init_table_sorting();
     enable_select_all();
     enable_row_selection();
     enable_search('<?php echo site_url("$controller_name/suggest")?>', '<?php echo $this->lang->line("common_confirm_search")?>');
     enable_email('<?php echo site_url("$controller_name/mailto")?>');
     enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>', '<?php echo $this->lang->line($controller_name."_none_selected")?>');

     });*/

    $(function () {
        $('#manage-table').DataTable({
            "info": true,
            "autoWidth": false,
            aoColumnDefs: [
                {aTargets: [0], bSortable: false},
                {aTargets: [5], bSortable: false}
            ],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "{base_url}customers/get_all", // json datasource
                type: "post",  // method  , by default get
                error: function () {  // error handling
                    $(".employee-grid-error").html("");
                    $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                    $("#employee-grid_processing").css("display", "none");

                }
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
                    </div>

                    <div class="col-sm-6 text-right">
                        <a class="btn btn-primary" data-toggle="modal"
                           href="<?php echo base_url() . "index.php/" . "$controller_name/view"; ?>"
                           data-target="#modal-container">
                            <i class="fa fa-plus"></i> <?php echo $this->lang->line($controller_name . '_new'); ?>
                        </a>

                        <?php if ($controller_name == 'customers') { ?>
                        <a class="btn btn-success" data-toggle="modal"
                           href="<?php echo base_url() . "index.php/" . "$controller_name/excel_import"; ?>"
                           data-target="#modal-container">
                            <i class="fa fa-file-excel-o"></i> Excel Import
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="box-body ">
                <div>
                    <a href="<?php echo "$controller_name/delete" ?>" class="btn btn-sm btn-default">
                        <i class="fa fa-trash"></i>
                        <?php echo $this->lang->line("common_delete") ?>
                    </a>
                    <button class="btn btn-sm btn-default" id="email">
                        <i class="fa fa-send"></i>
                        <?php echo $this->lang->line("common_email"); ?>
                    </button>
                </div>

                <br/>

                <table id="manage-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all"/></th>
                        <th><?php echo $this->lang->line('common_last_name') ?></th>
                        <th><?php echo $this->lang->line('common_first_name') ?></th>
                        <th><?php echo $this->lang->line('common_email') ?></th>
                        <th><?php echo $this->lang->line('common_phone_number') ?></th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>

            </div>

            <div id="feedback_bar"></div>
        </div>
    </div>
</div>