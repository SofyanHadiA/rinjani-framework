'use strict'

// Use javascript insted of HTML, to give better performance
app.template.dashboardHome =  '<section class="content-header"></section>' +
        '<section class="content">' +
            '<div class="row">' +
                '<div class="col-md-12">' +
                    '<div class="box">' +
                        '<div class="box-body">' +
                            '<dashboard-content/>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</section>';

app.template.dashboardContent = '{{#each data}}'+
        '<div class="col-md-6 col-sm-6 col-xs-12" >' +
            '<div id="module-icon-{{this.module_id}}>"  class="info-box">' +
                '<a href="#{{this.module_id}}" >' +
                    '<span class="info-box-icon bg-yellow">' +
                        '<i class="fa {{this.icon}}"></i>' +
                    '</span>' +
                '</a>' +
                '<div class="info-box-content">' +
                    '<a href="#{{this.module_id}}" >' +
                        '<h3>{{this.title}}</h3>' +
                    '</a>'+
                    '{{this.description}}' +
                '</div>' +
            '</div>' +
        '</div>'+
        '{{/each}}';