'use strict';

app.controller.customerController = function () {
    var customer = {};

    customer.title = app.language.customer.title;
    customer.description = app.language.customer.description;
    customer.delete = app.language.delete;
    customer.load = onLoad;

    customer.table = '#manage-table ';
    customer.tableGrid = app.tableGrid(table, "../customers");

    function onLoad() {
        customer.tableGrid = tableGrid.render([
            {data: 'last_name'},
            {data: 'first_name'},
            {data: 'email'},
            {data: 'phone_number'}
        ], 'person_id');
    }

    return customer;
};
