<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<base href="<?php echo base_url();?>" />
	
	<title>
		<?php echo $this->config->item('company').' -- '.$this->lang->line('common_powered_by').' OS Point Of Sale' ?>
	</title>
	
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/ospos.css" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/ospos_print.css"  media="print"/>		
	
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/bootstrap/dist/css/bootstrap.css');?>" />
	<link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/font-awesome/css/font-awesome.css');?>" />
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

<div id="content_area_wrapper" class="container">
	<div id="content_area">
