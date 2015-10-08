<?php

class Language extends PublicController
{
	function __construct()
	{
		parent::__construct('items');
		$this->load->library('item_lib');
		
		$this->data['pagetitle'] = $this->lang->line('module_' . strtolower(get_class()));
		$this->data['pagedescription'] = $this->lang->line('module_items_desc');
	}
	
	function index(){		
		echo json_encode($this->lang->language);
	}
}