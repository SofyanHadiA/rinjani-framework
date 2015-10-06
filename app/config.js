'use strict'

app.language = new function () {
    return {
        delete: 'Delete',

        customer:{
            title: 'Customers',
            description: 'Customers page description'
        }
    }
};

app.route = {
    'home': {
        'template': app.config.baseUrl + 'home/dashboard',
        'controller': 'dashboardController'
    },
    'customers': {
        template: '../app/people/customer.html',
        controller: 'customerController',
        model: ''
    },
    'items': {
        'template': '../app/item/item.html',
        'controller': 'itemController'
    }
};

app.route.default = 'home';

