<?php $this->load->view("partial/header"); ?>
<script type="text/javascript">
$(document).ready(function() 
{ 
    init_table_sorting();
    enable_select_all();
    enable_row_selection();
    enable_search('<?php echo site_url("$controller_name/suggest")?>','<?php echo $this->lang->line("common_confirm_search")?>');
    enable_email('<?php echo site_url("$controller_name/mailto")?>');
    enable_delete('<?php echo $this->lang->line($controller_name."_confirm_delete")?>','<?php echo $this->lang->line($controller_name."_none_selected")?>');
}); 

function init_table_sorting()
{
	//Only init if there is more than one row
	if($('.tablesorter tbody tr').length >1)
	{
		$("#sortable_table").tablesorter(
		{ 
			sortList: [[1,0]], 
			headers: 
			{ 
				0: { sorter: false}, 
				5: { sorter: false} 
			} 

		}); 
	}
}

function post_person_form_submit(response)
{
	if(!response.success)
	{
		set_feedback(response.message,'error_message',true);	
	}
	else
	{
		//This is an update, just update one row
		if(jQuery.inArray(response.person_id,get_visible_checkbox_ids()) != -1)
		{
			update_row(response.person_id,'<?php echo site_url("$controller_name/get_row")?>');
			set_feedback(response.message,'success_message',false);	
			
		}
		else //refresh entire table
		{
			do_search(true,function()
			{
				//highlight new row
				hightlight_row(response.person_id);
				set_feedback(response.message,'success_message',false);		
			});
		}
	}
}
</script>

<div id="title_bar">
	
	<h1 class="pull-left">
		<?php echo $this->lang->line('common_list_of').' '.$this->lang->line('module_'.$controller_name); ?>
	</h1>
	
	<div id="new_button">
		<div class="pull-left">
			<img src='<?php echo base_url()?>images/spinner_small.gif' alt='spinner' id='spinner' />
			<?php echo form_open("$controller_name/search",array('id'=>'search_form')); ?>
			<input type="text" name="search"  class="form-control"/>
			</form>
		</div>
		
		<a class="btn btn-primary" data-toggle="modal" href="<?php echo base_url()."index.php/"."$controller_name/view/-1/width:$form_width"; ?>" data-target="#modal-container">
			<i class="fa fa-plus"></i> <?php echo $this->lang->line($controller_name.'_new');?>
		</a>
		
		<?php if ($controller_name =='customers') {?>
		<a class="btn btn-success" data-toggle="modal" href="<?php echo base_url()."index.php/"."$controller_name/excel_import/width:$form_width"; ?>" data-target="#modal-container">
			<i class="fa fa-file-excel-o"></i> Excel Import
		</a>
		<?php } ?>
	
		<?php  
		/*echo anchor("$controller_name/view/-1/width:$form_width",
		"<div class='big_button' style='float: left;'><span>".$this->lang->line($controller_name.'_new')."</span></div>",
		array('class'=>'thickbox none','title'=>$this->lang->line($controller_name.'_new')));
		*/
		?>
		
		<?php 
		/*if ($controller_name =='customers') {?>
			<?php echo anchor("$controller_name/excel_import/width:$form_width",
			"<div class='big_button' style='float: left;'><span>Excel Import</span></div>",
				array('class'=>'thickbox none','title'=>'Import Items from Excel'));
			?>	
		<?php } */
		?>
	</div>
</div>


<div class="">
	<div class="">
		<?php echo anchor("$controller_name/delete",$this->lang->line("common_delete"),array("class"=>"btn btn-danger btn-sm")); ?>
	
		<button class="btn btn-success btn-sm" id="email"><?php echo $this->lang->line("common_email");?></button>
	</div>		
</div>

<div class id="table_holder">
<?php echo $manage_table; ?>
</div>
<?php echo $this->pagination->create_links();?>
<div id="feedback_bar"></div>
<?php $this->load->view("partial/footer"); ?>
