'use strict';

module.exports = function ($, $notify, $tablegrid, $modal, $form) {
    var customer = {};

    customer.load = onLoad;
    //customer.showModal = showModal;
    customer.tableGrid = {};
    customer.table = '#manage-table ';

    return customer;

    function onLoad() {

        customer.tableGrid = $tablegrid.render("#customer-table", 'customers',
            [
                { data: 'last_name' },
                { data: 'first_name' },
                { data: 'email' },
                { data: 'phone_number' }
            ], 'person_id');

        $('body').on('click', '#customer-add', function () {
            //$modal.show('customers/view', 'lg');
            //var customerForm = customerFormController.load();
        });
    }
    
    // function showModal(id) {
    //     new app.modalForm();
    // };

};