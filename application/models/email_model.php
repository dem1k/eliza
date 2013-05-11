<?php
class Email_model extends CI_Model {

    function getAll() {
        return $this->db
                ->get('email_book')
                ->result();
    }

    function save($data) {
        $this->db->insert('email_book',$data);
    }
    function getById($id) {

        return $this->db
                ->select('')
                ->from('email_book')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('email_book', $data);

    }
    function deleteById($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('email_book');
        return $query;
    }
    function save_message($data){
        $this->db->insert('email_messages',$data);
    }

}