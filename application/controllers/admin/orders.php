<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * @property Basket_model $basket_model
 */
    if ( ! class_exists('Controller'))
    {
        class Controller extends CI_Controller {}
    }
class Orders extends Controller {
    public function index(){
        redirect('/admin/orders/order_list');
    }
    public function order_list (){
        $data['orders']=$this->basket_model->getOrdersList();
        $data['res'] = $this->router->fetch_class();
        $data['template']= '/admin/orders/list';
        $this->load->view('admin/main',$data);
    }
    public function order_show (){
        $id=$this->uri->segment(4);
        if(!$id) redirect('/admin/orders/order_list','refresh');
        if(is_numeric($status = $this->input->get('status')))
        {$this->basket_model->updateOrserStatus($id,$status);}
        $data['products']=$this->basket_model->getOrder($id);
        $data['order_statuses']=$this->basket_model->getOrderStatuses();
        $data['template']= 'admin/orders/show';
        $data['res'] = $this->router->fetch_class();
        $this->load->view('admin/main',$data);
    }
    function _remap($method)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->$method();
    }
}