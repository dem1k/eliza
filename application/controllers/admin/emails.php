<?php
class Emails extends CI_Controller
{
    var $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['res'] = $this->router->fetch_class();
        $this->data['email_addresses'] = $this->email_model->getAll();
    }

    public function index()
    {

        $this->data['template'] = '/admin/emails/emails_list';
        $this->load->view('admin/main', $this->data);
    }

    public function create_message()
    {
        $this->data['template'] = '/admin/emails/create_message';
        $this->data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('title', 'Тема', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Сообщение', 'trim|xss_clean');
        $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean');
        $this->form_validation->set_rules('status', 'Статус', 'trim|xss_clean');

        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            } else {

                $result = array(
                    'title' => set_value('title'),
                    'message' => set_value('message'),
                    'description' => set_value('description'),
                    'category_art' => set_value('category_art'),
                );
                $this->email_model->save_message($result);
                redirect('/admin/article/');
            }


//            }
        } else {
            $this->load->view('admin/main', $this->data);
        }
    }

}