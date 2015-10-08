'use strict';

app.controller = app.controller || {};

app.controller.customerController = function () {
    var customer = {
        event : event || {}        
    };

    customer.title = app.language.module_customers;
    customer.description = app.language.module_customers_desc;
    customer.delete = app.language.delete;
    customer.load = onLoad;
    
    customer.tableGrid = {};

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
    
    function showModal() {
        // Show Forma Modal
    };

    return customer;
};
