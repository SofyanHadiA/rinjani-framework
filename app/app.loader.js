'use strict'
app.loader = {};

app.loader.load = function( location, container){	
	if(!container){
		container = "app-view";
	};
			
	$(container).load(location);
};

