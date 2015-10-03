'use strict';

app.tableGrid = function (table_container, controller_url) {
    var vm = {};
    vm.table = table_container;
    vm.dataTable = {};
    vm.render = render;
    vm.get_selected_rows = get_selected_rows;
    vm.delete = do_delete;

    return vm;

    function render(columnConfig, column_id) {

        columnConfig = [{
            sortable: false,
            data: column_id,
            render: function (data, type, row) {
                return '<input type="checkbox" id="person_' + data +
                    '" value="' + data + '"/>';
            }
        }]
            .concat(columnConfig)
            .concat([{
                sortable: false,
                data: column_id,
                render: function (data, type, row) {
                    return '<div class="btn-group"><a class="btn btn-xs btn-default edit-data" href="' + controller_url + '/view/' + data + '">'
                        + '<i class="fa fa-edit"></i></a> '
                        + '<a class="btn btn-xs btn-default btn-delete" href="' + controller_url + '/delete/' + data
                        + '"><i class="fa fa-trash"></i></a></div>';
                }
            }]);

        vm.dataTable = $(vm.table).DataTable({
            "info": true,
            "autoWidth": false,
            columns: columnConfig,
            "pageLength": 25,
            "order": [[1, "asc"]],
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: controller_url + '/get',
                type: "post",
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

        $('#add-data').click(function () {
            event.preventDefault();
            var url = $(this).attr('href');
            app.modalForm(url, 'lg');
        });

        $(table_container + ' tbody').on('click', '.edit-data', function () {
            event.preventDefault();
            var url = $(this).attr('href');
            app.modalForm(url, 'lg');
        });

        $(table_container + ' #select-all').click(function () {
            if ($(this).prop('checked')) {
                $(table_container + " tbody :checkbox").each(function () {
                    $(this).prop('checked', true);
                });
            }
            else {
                $(table_container + " tbody :checkbox").each(function () {
                    $(this).prop('checked', false);
                });
            }
        });

        $(table_container + " tbody").on("click", '.btn-delete', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            bootbox.confirm('Are you sure to delete this data?', function (result) {
                if (result) {
                    do_delete(url);
                }
            });
        });

        $('#delete-selected').click(function (event) {
            event.preventDefault();
            if ($(table_container + " tbody :checkbox:checked").length > 0) {
                var url = $("#delete-selected").attr('href');
                bootbox.confirm('Are you sure to delete selected data(s)?', function (result) {
                    if (result) {
                        do_delete(url);
                        $(table_container + '#select-all').prop('checked', false);
                    }
                });
            }
            else {
                $.notify({
                    icon: 'fa fa-warning',
                    message: 'No data selected',
                }, {
                    type: "danger"
                });
            }
        });

        $('#import-excel').click(function () {
            event.preventDefault();
            var url = $(this).attr('href');
            app.modalForm(url, 'md');
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
        app.http.post(url, {'ids[]': row_ids}, vm.dataTable.ajax.reload)
    }
};