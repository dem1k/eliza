<?php
class Images_model extends CI_Model
{
    /*
    * id
    * thumb
    * image
    * is_first
    * product_id
    */
    function getAll()
    {
        return $this->db
            ->get('images')
            ->result();
    }

    function save($data)
    {
        $this->db->insert('images', $data);
        return $this->db->insert_id();
    }

    function getById($id)
    {

        return $this->db
            ->select('')
            ->from('images')
            ->where('id', $id)
            ->get()
            ->row();
    }

    function getByProductId($id)
    {

        return $this->db
            ->select('')
            ->from('images')
            ->where('product_id', $id)
            ->get()->result();
    }

    function updateById($data, $id)
    {
        $this->db
            ->where('id', $id)
            ->update('images', $data);

    }

    function unsetMain($product_id)
    {
        return $this->db
            ->where('product_id', $product_id)
            ->update('images', array('is_first' => '0'));
    }

    function setMain($id)
    {
        return $this->db
            ->where('id', $id)
            ->update('images', array('is_first' => '1'));
    }

    function deleteById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('images');
        return $query;
    }

}