<?php

class Messages extends CI_Controller
{

    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    public function index()
    {
        $this->data['res'] = $this->router->fetch_class();

        $messages = $this->messages_model->getMessages();
        $this->data['messages'] = $messages;
        //var_dump($messages);exit;
        $this->data['template'] = 'admin/messages/view';
        $this->load->view('admin/main', $this->data);
    }


    function _remap($method)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->$method();
    }
}
