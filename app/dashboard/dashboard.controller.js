'use strict';

app.controller.dashboardController = function () {
    var dashboard = {};

    dashboard.title = app.language.dashboard.title;
    dashboard.description = app.language.dashboard.description;
    dashboard.delete = app.language.delete;
    dashboard.load = onLoad;
	
    function onLoad() {
         $.get("../home/dashboard", function (response) {
                try {
                                    
                    if(response.success){
                    var template = "<div>{{data}}</div>"; //TODO: Fix template
     /*               
	foreach($allowed_modules->result() as $module)
	{
		if (sizeof(explode('_', $module->module_id)) == 1)
		{
	?>
		<div class="col-md-6 col-sm-6 col-xs-12" >
			<div id="module-icon-<?php echo $module->module_id;?>"  class="info-box">	
				
				<a href="#<?php echo $module->module_id;?>" >
					<span class="info-box-icon bg-yellow">
						<i class="fa <?php echo $module->icon; ?>"></i>
					</span>
				</a>
				
				<div class="info-box-content">	
					<a href="#<?php echo $module->module_id;?>" >
						<h3><?php echo $this->lang->line("module_".$module->module_id) ?></h3>	
					</a>			
					<?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
				</div><!-- /.info-box-content -->
			</div><!-- /.info-box -->			
		</div>		
	<?php
		}
	}
    */

                    
                    
                    var rendered = Handlebars.compile(template);                   
                    rendered = rendered(response.data)
                    
                    $('#dashboard-model').html(rendered);
                                        
                    }else{
                        app.notify.danger(response.message);
                    }
                }
                catch (e) {
                    app.notify.danger("Error on load page " + hash + "<br/>" + e);
                }
            });
    }

    return dashboard;
};
