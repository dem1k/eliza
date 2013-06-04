<?php
class Basket_model extends CI_Model
{
    public function addOrder($data)
    {
        $q = $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }

    public function addUser($data)
    {
        $q = $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function addOrUpdateUser($data)
    {
        $userexist = $this->db->select()->from('users')->where('email', $data['email'])->get()->row();
        if ($userexist)
            $q = $this->db->update('users', $data);
        else
            $q = $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function addUserMeta($data)
    {
        $q = $this->db->insert('meta', $data);
        return $this->db->insert_id();
    }

    public function addOrderProduct($product, $order, $male, $female)
    {
        $q = $this->db->insert('order_products', array(
            'product_id' => $product,
            'order_id' => $order,
            'male' => $male,
            'female' => $female
        ));
    }

    public function getOrdersList()
    {
        return $this->db
            ->select('
            orders.id as id,
            orders.deals as deals,
            orders.description as description,
            orders.created_at as created_at,
            users.id as user_id,
            users.username as username,
            order_statuses.name as status
            ')
            ->from('orders')
            ->join('users', 'users.id  = orders.user_id')
            ->join('order_statuses', 'order_statuses.id = orders.status')
            ->get()
            ->result();

    }

    public function getOrderStatuses()
    {
        return $this->db->get('order_statuses')->result();
    }

    public function getOrder($id)
    {
        $this->db->select('
        orders.id as order_id,
        products.name as product_name,
        products.artikul as artikul,
        products.image_big as image_big,
        users.username as username,
        users.email as email,
        meta.phone as phone,
        meta.company as city,
        meta.first_name as first_name,
        meta.last_name as last_name,
        orders.created_at as created_at,
        orders.deals as deals,
        orders.description as description,
        orders.status as status,
        order_products.male as male,
        order_products.female as female,
        ')->from('orders');

        $this->db->join('order_products', 'orders.id = order_products.order_id', 'left');
        $this->db->join('products', 'products.id = order_products.product_id', 'left');
        $this->db->join('users', 'users.id = orders.user_id', 'left');
        $this->db->join('meta', 'users.id = meta.user_id', 'left');
        $this->db->where('orders.id', $id);
        return $this->db->get()->result();
//        var_dump($this->db->last_query());die;

    }

    public function updateOrserStatus($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('orders', array('status' => $status));
    }
}