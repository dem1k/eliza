<?php
class Article_model extends CI_Model {

    function getAll() {
        return $this->db
                ->get('articles')
                ->result_array();
    }
    function  getAllJoined() {
        return $this->db->select('articles.id as id,articles.name as name,articles.main_page as main_page,category_art.name as category,articles.static as static')
                ->from('articles')
                ->join('category_art','articles.category_art = category_art.id','left')
                ->order_by('static','desc')
                ->order_by('id','desc')
                ->get()
                ->result_array();
    }

    function save($data) {
        $this->db->insert('articles',$data);
    }
    function getById($id) {

        return $this->db
                ->select('')
                ->from('articles')
                ->where('id',$id)
                ->get()
                ->row();
    }
    function getByCatId($cat_id) {

        return $this->db
                ->select('')
                ->from('articles')
                ->where('category_art',$cat_id)
                ->get()
                ->result_array();
    }
    function getByCatSlug($slug) {

        return $this->db
                ->select('
                    articles.id as id,
                    articles.name as name,
                    articles.cut as cut,
                    articles.slug as slug,
                    articles.image as image,
                    category_art.name as category_art')
                ->from('articles')
                ->join('category_art','articles.category_art = category_art.id')
                ->where('category_art.slug',$slug)
                ->get()
                ->result();
    }
    function getBySlug($slug) {
        return $this->db->select()
                ->from('articles')
                ->where('slug',$slug)
                ->get()
                ->row();
    }
    function updateById($data,$id) {
        $this->db
                ->where('id', $id)
                ->update('articles', $data);

    }
    function deleteById($id) {
        $this->db->where('id', $id);
        $query = $this->db->delete('articles');
        return $query;
    }

    function getLast($limit) {
        return $this->db
                ->select()
                ->from('articles')
                ->order_by("id", "desc")
                ->limit($limit)
                ->get()
                ->row();
    }
    function getByCategory($category_art,$limit) {
        return $this->db
                ->select('id,name,slug,cut,image,image2')
                ->from('articles')
                ->where('category_art',$category_art)
                ->order_by("id", "desc")
                ->limit($limit)
                ->get()
                ->result();
    }

}