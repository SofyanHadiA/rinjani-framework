'use strict'
// TODO: Load from server
app.language = new function () {
    return {
        delete: 'Delete',
        dashboard:{
            title: 'Dashboard',
            description: 'Dashboars page description'
        },
        customer:{
            title: 'Customers',
            description: 'Customers page description'
        },
        item:{
            title: 'Customers',
            description: 'Customers page description'
        }
    }
};

app.route = {
    'home': {
        'template': '../app/home/dashboard.html',
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

