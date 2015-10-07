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
		 $logged_in_employee_info = $this->Employee->get_logged_in_employee_info();
		
		 echo json_encode(array('success' => true,
		 		'data' =>  $this->Module->get_allowed_modules($logged_in_employee_info->person_id)->result()));
		
		//$allowed_modules->result();
		
		//header('Content-Type: text/html');
		//$this->load->view('dashboard');
	}

	
	function logout()
	{
		$this->Employee->logout();
	}
}
?>