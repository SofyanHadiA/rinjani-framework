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

class PublicController extends Controller
{
    /**
     * Render view page
     */
    function render($view = null, $data = null)
    {
        if (isset($this->data['title']))
            $this->data['pagetitle'] = $this->data['title'];

        if (isset($this->data['description']))
            $this->data['pagedescription'] = $this->data['description'];

        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['footer'] = null;

        $this->data['data'] = &$this->data;

        header('Content-Type: text/html');
        $this->parser->parse($this->data['template'], $this->data);
    }
}

class AdminController extends Controller
{

    /*
	Controllers that are considered secure extend Secure_area, optionally a $module_id can
	be set to also check if a user can access a particular module in the system.
	*/
    function __construct($module_id = null, $submodule_id = null)
    {
        parent::__construct();
        $this->load->model('Employee');
        if (!$this->Employee->is_logged_in()) {
            redirect('login');
        }
        $employee_id = $this->Employee->get_logged_in_employee_info()->person_id;
        if (!$this->Employee->has_module_grant($module_id, $employee_id) ||
            (isset($submodule_id) && !$this->Employee->has_module_grant($submodule_id, $employee_id))
        ) {
            redirect('no_access/' . $module_id . '/' . $submodule_id);
        }

        //load up global data
        $logged_in_employee_info = $this->Employee->get_logged_in_employee_info();
        $data['allowed_modules'] = $this->Module->get_allowed_modules($logged_in_employee_info->person_id);
        $data['user_info'] = $logged_in_employee_info;
        $data['controller_name'] = $module_id;
        $this->load->vars($data);
    }

    /**
     * Render view page
     */
    function render($view = null, $data = null)
    {
        if ($data)
            $this->data = array_merge($this->data, $data);

        if ($view)
            $this->data['pagebody'] = $view;

        if (isset($data['title']))
            $this->data['pagetitle'] = $this->data['title'];

        if (isset($this->data['description']))
            $this->data['pagedescription'] = $this->data['description'];

        // Massage the menubar
        $choices = $this->config->item('menu_choices');

        if ($choices) {
            foreach ($choices['menudata'] as &$menuitem) {
                $menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
            }
        } else {
            $choices = [];
        }

        $this->data['header'] = $this->parser->parse('theme/header', $this->data, true);
        $this->data['menubar'] = $this->parser->parse('theme/menubar', $this->data, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['footer'] = $this->parser->parse('theme/footer', $this->data, true);
        $this->data['control_sidebar'] = $this->parser->parse('theme/control_sidebar', $this->data, true);

        // title for all but the homepage
        // $layout = empty($this->data['title']) ? 'jumbotitle' : 'title';
        // $this->data['titleblock'] = $this->parser->parse('theme/' . $layout, $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;

        header('Content-Type: text/html');
        $this->parser->parse($this->data['template'], $this->data);
    }

    function _remove_duplicate_cookies()
    {
        //php < 5.3 doesn't have header remove so this function will fatal error otherwise
        if (function_exists('header_remove')) {
            $CI = &get_instance();

            // clean up all the cookies that are set...
            $headers = headers_list();
            $cookies_to_output = array();
            $header_session_cookie = '';
            $session_cookie_name = $CI->config->item('sess_cookie_name');

            foreach ($headers as $header) {
                list ($header_type, $data) = explode(':', $header, 2);
                $header_type = trim($header_type);
                $data = trim($data);

                if (strtolower($header_type) == 'set-cookie') {
                    header_remove('Set-Cookie');

                    $cookie_value = current(explode(';', $data));
                    list ($key, $val) = explode('=', $cookie_value);
                    $key = trim($key);

                    if ($key == $session_cookie_name) {
                        // OVERWRITE IT (yes! do it!)
                        $header_session_cookie = $data;
                        continue;
                    } else {
                        // Not a session related cookie, add it as normal. Might be a CSRF or some other cookie we are setting
                        $cookies_to_output[] = array('header_type' => $header_type, 'data' => $data);
                    }
                }
            }

            if (!empty ($header_session_cookie)) {
                $cookies_to_output[] = array('header_type' => 'Set-Cookie', 'data' => $header_session_cookie);
            }

            foreach ($cookies_to_output as $cookie) {
                header("{$cookie['header_type']}: {$cookie['data']}", false);
            }
        }
    }
}