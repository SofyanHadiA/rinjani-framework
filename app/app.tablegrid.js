'use strict';

app.tableGrid = function (table_container, get_data_url) {
    var vm = {};
    vm.table = table_container;
    vm.dataTable = {};
    vm.render = render;
    vm.get_selected_rows = get_selected_rows;
    vm.delete = do_delete;

    return vm;

    function render(columnConfig) {
        vm.dataTable = $(vm.table).DataTable({
            "info": true,
            "autoWidth": false,
            columns: columnConfig,
            "pageLength": 25,
            "order": [[1, "asc"]],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: get_data_url,
                type: "post",  // method  , by default get
                error: function (error) {
                    $.notify({
                        icon: 'fa fa-info-circle',
                        message: error.message
                    }, {
                        type: "info"
                    });
                }
            }
        });

        return vm.dataTable;
    }

    function get_selected_rows() {
        var selected_rows = new Array();
        $(table_container + "tbody :checkbox:checked")
            .each(function () {
                selected_rows.push($(this).val());
            });
        return selected_rows;
    }

    function do_delete(url) {
        var row_ids = get_selected_rows();
        $.post(url, {'ids[]': row_ids}, function (response) {

            if (response.success) {

                vm.dataTable.ajax.reload();

                $.notify({
                    icon: 'fa fa-info-circle',
                    message: response.message
                }, {
                    type: "info"
                });
            }
            else {
                $.notify({
                    icon: 'fa fa-warning',
                    message: response.message
                }, {
                    type: "warning"
                });
            }
        }, "json");
    }
};