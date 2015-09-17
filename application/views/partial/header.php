<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	
	<title>
		<?php echo $this->config->item('company').' -- '.$this->lang->line('common_powered_by').' OS Point Of Sale' ?>
	</title>
	
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/style.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/style_print.css"  media="print"/>		
	
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/bootstrap/dist/css/bootstrap.css');?>" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/font-awesome/css/font-awesome.css');?>" />
	
	<script>BASE_URL = '<?php echo site_url(); ?>';</script>
		
	<script src="<?php echo base_url('public/jquery/dist/jquery.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url('public/bootstrap/dist/js/bootstrap.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
	
	<script src="<?php echo base_url();?>js/jquery.color.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.metadata.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.tablesorter.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.ajax_queue.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.bgiframe.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.autocomplete.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.validate.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/jquery.jkey-1.1.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/thickbox.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/common.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/manage_tables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/swfobject.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/date.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
	<script src="<?php echo base_url();?>js/datepicker.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
</head>

<body>

<section id="navigation">
	<?php
		if(!isset($no_navigation))
		{ 
			$this->load->view("partial/_navigation");
		} 
	?>
</section>

<div id="content_area_wrapper" class="container-fluid">
	<div id="content_area">
