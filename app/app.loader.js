'use strict'

$(function(){

	// Bind the event.
	window.onhashchange  = hashchanged;

	// Trigger the event (useful on page load).
	hashchanged();

	// TODO: Override loader
	//function loadContent(url){
	//	app.http.get(url, data, function(){
	//		$('app-view').innerHTML(response)
	//	})
	//};

	function hashchanged() {
		var hash = location.hash.replace(/^#/, '')

		if (hash) {
			try {
				$('app-view').load(app.route[hash].template);
			}
			catch(e){
				app.notify.danger("Error on load page "+ hash);
				$('app-view').load(app.route[app.route.default].template);
			}
		}
		else{
			$('app-view').load(app.route[app.route.default].template);
		}
	}
});