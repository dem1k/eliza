<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}

class Auth extends Controller {

    var $data = array();

    public function userlist(){
            $this->data['users'] = $this->ion_auth->get_users_array();
        $this->data['template'] = 'admin/auth/userlist';
        $this->data['res'] = $this->router->fetch_class();
        $this->load->view('admin/main',$this->data);
    }
}
