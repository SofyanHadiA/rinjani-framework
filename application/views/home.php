<?php 
	$this->load->view("partial/header"); 
?>

<br />
<h3><?php echo $this->lang->line('common_welcome_message'); ?></h3>
<div id="home_module_list">
	<?php
	foreach($allowed_modules->result() as $module)
	{
		if (sizeof(explode('_', $module->module_id)) == 1)
		{
	?>
	<div class="module-item col-md-6" >
		<a href="<?php echo site_url("$module->module_id");?>">		
			<img src="<?php echo base_url().'images/menubar/'.$module->module_id.'.png';?>" class="circle" />
			<br />				
			<?php echo $this->lang->line("module_".$module->module_id) ?>
		</a>
		
		 - <?php echo $this->lang->line('module_'.$module->module_id.'_desc');?>
	</div>
	<?php
		}
	}
	?>
</div>

<?php $this->load->view("partial/footer"); ?>