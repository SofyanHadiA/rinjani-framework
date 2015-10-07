'use strict'
// TODO: Load from server
app.language = {
    delete: 'Delete',
    dashboard: {
        title: 'Dashboard',
        description: 'Dashboars page description'
    },
    customer: {
        title: 'Customers',
        description: 'Customers page description'
    },
    item: {
        title: 'Customers',
        description: 'Customers page description'
    }
};

app.route = {
    home: {
        template: 'dashboardHome',
        controller: 'dashboardController'
    },
    customers: {
        templateUrl: '../app/people/customer.html',
        controller: 'customerController',
        model: ''
    },
    items: {
        templateUrl: '../app/item/item.html',
        controller: 'itemController'
    }
};

app.route.default = 'home';

