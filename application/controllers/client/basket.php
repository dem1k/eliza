<?php
class Basket extends CI_Controller
{
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    public function add()
    {
        if ($product['id'] = $this->input->get('id')) {
            $product['qty'] = 1;
            $product['price'] = 1;
            $product['name'] = $this->input->get('name') ? $this->input->get('name') : 'Obruchalnoe kolco';
//            $product['options'] = array('artikul' => $this->input->get('artikul'), 'f_art' => $this->input->get('f_art'));
            $this->cart->insert($product);
            echo $this->cart->total_items();
        }

    }


    public function show()
    {
        if ($this->input->is_ajax_request())
            $view = 'client/basket/ajax_basket';
        else
            $view = 'client/main';
        $products = array();
        foreach ($this->cart->contents() as $item) {
//            var_dump($item);die;
            $products[] = array('ring' => $this->product_model->getById($item['id']), 'rowid' => $item['rowid']);
        }
        $this->data['template'] = 'client/basket/basket';
        $this->data['products'] = $products;
        $this->load->view($view, $this->data);
    }


    public function buy()
    {
        if ($this->cart->total_items() < 1) redirect('/basket/show/', 'refresh');
        {
            if ($phone = $this->input->get('number_phone') && $email = $this->input->get('email')) {

                $userdata['created_on'] = time();
                $userdata['username'] = $this->input->get('email');
                $userdata['group_id'] = 0;
                $userdata['active'] = 0;
                $userdata['email'] = $this->input->get('email');

                $user_id = $this->basket_model->addOrUpdateUser($userdata);
                $usermetadata['user_id'] = $user_id;
                $usermetadata['first_name'] = $this->input->get('name_recipient');
                $usermetadata['phone'] = $this->input->get('number_phone');
                $usermetadata['company'] = $this->input->get('your_city');
                $this->basket_model->addUserMeta($usermetadata);
                $orderdata['deals'] = $this->input->get('deals') ? 1 : 0;
                $orderdata['description'] = $this->input->get('description');
                $orderdata['user_id'] = $user_id;
                $order_id = $this->basket_model->addOrder($orderdata);
                $products = $this->input->get('product');
                if (isset($products) && is_array($products) && $order_id)
                    foreach ($products as $product) {
                        $male = $this->input->get('ring_' . $product . '_male') ? 1 : 0;
                        $female = $this->input->get('ring_' . $product . '_female') ? 1 : 0;
                        $this->basket_model->addOrderProduct($product, $order_id, $male, $female);
                    }
                $this->cart->destroy();
                $this->data['template'] = 'client/basket/success_buy';


                $this->load->view('client/main', $this->data);
            }var_dump($phone);
            die('123');
        }
    }


    public function checkout()
    {

        if ($this->input->is_ajax_request())
            $view = 'client/basket/ajax_basket';
        else
            $view = 'client/main';
        $products = array();
        foreach ($this->cart->contents() as $item) {
            $products[] = $this->product_model->getById($item['id']);
            $this->data['ring_' . $item['id'] . '_male'] = $this->input->get('ring_' . $item['id'] . '_male');
            $this->data['ring_' . $item['id'] . '_female'] = $this->input->get('ring_' . $item['id'] . '_female');
        }
        $this->data['template'] = 'client/basket/checkout';
        $this->data['products'] = $products;
        if ($this->cart->total_items() < 1) redirect('/basket/show/', 'refresh');
        $this->load->view($view, $this->data);
    }

    public function clear()
    {
        $this->cart->destroy();
    }

    public function remove()
    {
        if ($this->input->is_ajax_request() && $row = $this->input->get('rowid')) {
            $this->data['rowid'] = $row;
            $this->data['qty'] = 0;
            $this->cart->update($this->data);
            return $this->cart->total_items();
        }
    }
}