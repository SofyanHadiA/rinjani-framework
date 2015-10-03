/**
 * Created by user on 03/10/2015.
 */

app.route = {
    'home' : {
        'template' : app.config.baseUrl + 'home/dashboard',
        'controller': {}
    },
    'customers' : {
        'template' : app.config.baseUrl + 'customers',
        'controller': {}
    },
    'items' : {
        'template' : app.config.baseUrl + 'items',
        'controller': {}
    }
};

app.route.default = 'home';

