<?php
class Messages_model extends CI_Model {

    function getMessages() {
        $this->db->select('')
                ->from('messages')
                ->order_by('id','DESC');
        $q = $this->db->get();
        return $q->result();
    }


}


?>
