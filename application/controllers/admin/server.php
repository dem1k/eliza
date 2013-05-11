<?php
class Server extends CI_Controller{
    public function index(){
        $data['template'] = '/admin/info';
        $data['res'] = $this->router->fetch_class();
        $this->load->view('/admin/main',$data);
    }
}
