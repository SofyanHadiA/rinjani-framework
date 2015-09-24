
<div id="home_module_list">
	<?php
	foreach($allowed_modules->result() as $module)
	{
		if (sizeof(explode('_', $module->module_id)) == 1)
		{
	?>
	<div class="module-item col-md-6" >
		<div id="module-icon-<?php echo $module->module_id;?>">
			<a href="<?php echo site_url("$module->module_id");?>" >
				<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" class="circle" />
				<br />
				<?php
                echo $this->lang->line("module_".$module->module_id)
                ?>
                {$module->module_id}
			</a>

			- <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
		</div>
	</div>
	<?php
		}
	}
	?>
</div>