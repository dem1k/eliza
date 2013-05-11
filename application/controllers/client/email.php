<?php
class Email extends CI_Controller
{
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    function subscribe()
    {
        if ($this->input->post('subscribe') AND  $email = $this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            set_value('email',$email);
            if ($this->form_validation->run() == FALSE)
            {
                echo json_encode(array('error'=>'Пожалуйста введите корректный адрес электронной почты'));
            }
            else
            {
                $this->email_model->save(array(
                    'email'=>$email,
                    'ipaddr'=>$_SERVER['REMOTE_ADDR'],
                    'info'=>$_SERVER['HTTP_USER_AGENT']
                ));
                echo json_encode(array('message'=>'Адрес электронной почты успешно добавлен!'));
            }
        } else show_404();
    }
}