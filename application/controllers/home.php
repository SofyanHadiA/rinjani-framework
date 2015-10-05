<?php
require_once("secure_areas.php");

class Home extends Secure_area 
{
	function __construct()
	{
		parent::__construct();

		$this->data['pagetitle'] = 'Dashboard';
		$this->data['description'] = $this->lang->line('common_welcome_message');
	}
	
	function index()
	{
        $this->render();
	}

	function dashboard()
	{
		header('Content-Type: text/html');
		$this->load->view('dashboard');
	}

	
	function logout()
	{
		$this->Employee->logout();
	}
}
?>