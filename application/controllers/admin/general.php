<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General extends CI_Controller
{
    var $data = array();
    var $seo;

    public function index()
    {
        $this->data = array();
        $this->data['template'] = 'admin/general/view';
        $this->data['res'] = Null;
        redirect('/admin/category');
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
