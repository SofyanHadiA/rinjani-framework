'use strict'
// TODO: Load from server
app.language = app.http.get('../language');

app.route = {
    home: {
        template: dashboardHome,
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

