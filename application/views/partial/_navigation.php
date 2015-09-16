<div id="menubar" class="navbar navbar-inverse navbar-fixed-top">
	<div id="menubar_container" class="container-fluid">
		
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-brand" href="#">
				<?php echo $this->config->item('company'); ?>				
			</a>
		</div>				
				
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					  Menu <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
				<?php
				foreach($allowed_modules->result() as $module)
				{
				?>
				<li class="" >
					<a href="<?php echo site_url("$module->module_id");?>">
						<!--<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" />-->
						<?php echo $this->lang->line("module_".$module->module_id) ?>
					</a>
				</li>
				<?php
				}
				?>
				</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a>
						<i class="glyphicon glyphicon-user"></i>
						<?php echo $this->lang->line('common_welcome')." $user_info->first_name $user_info->last_name!"; ?>
					</a>				
				</li>				
				<li>
					<?php echo anchor("home/logout",$this->lang->line("common_logout")); ?>
				</li>				
				<li>
					<a><?php echo date('F d, Y h:i a') ?></a>
				</li>
			</ul>			
		</div>				
	</div>
</div>