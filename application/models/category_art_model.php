<?php
class Category_art_model extends CI_Model {

    function getAll() {
        return $this->db
                ->select('')
                ->from('category_art')
                ->get()
                ->result_array();
    }
    function getById($id) {
        return $this->db->select('')
                ->from('category_art')
                ->where('id',$id)
                ->get()
                ->result_array();
    }
    function updateById($data,$id) {
        $this->db->where('id', $id);
        $this->db->update('category_art', $data);

    }




}