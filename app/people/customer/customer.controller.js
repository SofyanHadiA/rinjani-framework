'use strict';


var customerController = function ($language) {
    var customer = this;

    customer.load = onLoad;
    customer.showModal = showModal;
    customer.tableGrid = {};

    customer.table = '#manage-table ';
    customer.tableGrid = app.tableGrid(customer.table, "../customers");

    return customer;

    function onLoad() {
        customer.tableGrid = customer.tableGrid.render([
            {data: 'last_name'},
            {data: 'first_name'},
            {data: 'email'},
            {data: 'phone_number'}
        ], 'person_id');
    }
    
    // function showModal(id) {
    //     new app.modalForm();
    // };

};