<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Controller extends CI_Controller
{
    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our contents

    function __construct()
    {
        parent::__construct();

        // Set default value
        $this->data = array();
        $this->errors = array();
        $this->data['lang'] = $this->lang->language;
        $this->data['header'] = null;
        $this->data['menubar'] = null;
        $this->data['titleblock'] = null;
        $this->data['footer'] = null;
        $this->data['control_sidebar'] = null;
        $this->data['pagedescription'] = null;
        $this->data['base_url'] = $this->config->base_url();
        $this->data['template'] = 'theme/template';
        $this->data['scripts'] = array();

        header('Content-Type: application/json');
    }

    abstract function render($view = null, $data = null);
}

// TODO: Fix this, it should not using require_once but load from the frameworks
require_once('PublicController.php');
require_once('SecureController.php');