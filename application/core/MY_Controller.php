<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Controller extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our contents

    function __construct()
    {
        parent::__construct();
        $this->data = array();
        $this->errors = array();
        $this->data['header'] = null;
        $this->data['menubar'] = null;
        $this->data['titleblock'] = null;
        $this->data['footer'] = null;
    }
}

class PublicController extends Controller {
    /**
     * Render view page
     */
    function render()
    {
        if (!isset($this->data['pagetitle']))
            $this->data['pagetitle'] = $this->data['title'];

        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['footer'] = null;

        $this->data['data'] = &$this->data;

        $this->parser->parse('theme/template', $this->data);
    }
}

class AdminController extends Controller {
    /**
     * Render view page
     */
    function render()
    {
        if (!isset($this->data['pagetitle']))
            $this->data['pagetitle'] = $this->data['title'];

        // Massage the menubar
        $choices = $this->config->item('menu_choices');

        if($choices['menudata']) {
            foreach ($choices['menudata'] as &$menuitem) {
                $menuitem['active'] = (ltrim($menuitem['link'], '/ ') == uri_string()) ? 'active' : '';
            }
        };

        $this->data['menubar'] = $this->parser->parse('theme/menubar', $choices, true);
        $this->data['footerbar'] = $this->parser->parse('theme/menubar', $this->config->item('footer_choices'), true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

        // title for all but the homepage
        // $layout = empty($this->data['title']) ? 'jumbotitle' : 'title';
        // $this->data['titleblock'] = $this->parser->parse('theme/' . $layout, $this->data, true);

        // finally, build the browser page!
        $this->data['data'] = &$this->data;

        $this->parser->parse('theme/template', $this->data);
    }
}