 'use strict'
 
  app.notify = {};
 
 app.notify.info = function (message) {	 
	 return $.notify(
			{icon: 'fa fa-info-circle', message: message}, 
			{type: 'info', z_index: 1100});				
 };
 
 app.notify.warning = function (message) {	 
	 return $.notify(
			{icon: 'fa fa-warning', message: message}, 
			{type: 'warning', z_index: 1100});				
 };