<?php
class Seo_model extends CI_Model {

    public function getSeo() {
        $q = $this->db->get('seo');
        return $q->row();
    }

    public function updateSeo($data) {
        $q = $this->db->update('seo', $data);
        return $q;
    }

}


?>
