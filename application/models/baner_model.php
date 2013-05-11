<?php
class Baner_model extends CI_Model
{
   public function getAll(){
       return $this->db->select()->from('baners')->get()->result();
   }
    public function getAllBanerTypes(){
        return $this->db->select()->from('baner_types')->get()->result();
    }
    public function getAllBanerPlaces(){
        return $this->db->select()->from('baner_places')->get()->result();
    }
    function getById($id) {

        return $this->db
            ->select('')
            ->from('baners')
            ->where('id',$id)
            ->get()
            ->row();
    }
    function save($data) {
        $this->db->insert('baners',$data);
    }
    /**
     * @param $limit
     * @param $type - banner type id
     * @return mixed
     */
    public function getLastAddedBanners($limit,$type){
        return $this->db->select()->from('baners')
            ->where('baners_type_id',$type)
            ->limit($limit)
            ->get()->result();
    }
    function deleteById($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('baners');
        return $query;
    }

}