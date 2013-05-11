<?php

class Contacts extends CI_Controller {

    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    function index() {

        $personal= $this->personal_model->getPersonal();
        $this->data['personal']=$personal[0];
        //var_dump($this->data);exit;
        $this->load->model('admin/seo_model','',true);
        $seo=$this->seo_model->getseo();
        $this->data['seo']=$seo[0];
        $this->data['template'] = 'client/contacts/view';
        $this->data['categories'] = $this->catalog_model->getCatalog();
        $this->load->view('client/main', $this->data);


    }
    function message() {
        $this->load->model('admin/seo_model','',true);
        $seo=$this->seo_model->getseo();
        $this->data['seo']=$seo[0];
        $this->data['template']='client/contacts/view';
        $this->data['title']='Contacts';

        $this->data['categories'] = $this->catalog_model->getCatalog();
        $this->form_validation->set_rules('betreff', 'betreff', 'trim|required|email|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('komentar', 'komentar', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'name', 'trim|required|xss_clean');
        if ($this->input->post('action', '') == 'send') {
            if ($this->form_validation->run() == FALSE) {
                $personal= $this->personal_model->getPersonal();
                $this->data['personal']=$personal[0];
                $this->load->view('client/main',$this->data);
            } else {

                $save=array(
                        'email'=>set_value('email'),
                        'message'=>set_value('komentar'),
                        'name'=>set_value('name'),
                        'title'=>set_value('betreff'),
                        'date'=>date('Y-m-d')
                );

                $this->personal_model->saveMessage($save);
                $this->data['template']='client/contacts/messagesent';
                $this->data['title']='Message sent succesfuly';
                $this->load->view('client/main',$this->data);
            }


        }




    }


}


?>
