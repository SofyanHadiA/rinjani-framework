<?php
require_once("secure_areas.php");

class Home extends Secure_area 
{
	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
        $this->data['title'] = 'Dashboard';
		$this->data['description'] = 'Dashboard description';
        $this->data['pagebody'] = 'home';
        $this->render();
	}
	
	function logout()
	{
		$this->Employee->logout();
	}
}
?>