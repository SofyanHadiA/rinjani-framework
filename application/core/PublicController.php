<?php

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
