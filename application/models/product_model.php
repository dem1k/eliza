<?php

class Product_model extends CI_Model
{
    /**
     * @param $collention_id
     * @param int $limit = 3
     */
    public function getRelatedRings($id,$collection_id, $limit = 3)
    {
        return $this
            ->db->from('products')
            ->where('collection_id', $collection_id)
            ->where('id <>',$id)
            ->order_by('fan','random')
            ->limit($limit)->get()->result();
    }

    /**
     * @param bool $active = true
     * @param int $page = 1
     * @param int $limit = 20
     * @param array $brand = array()
     * @param array $color = array()
     * @param array $rock = array()
     * @param bool $sort = array()
     * @return mixed object
     */
    public function getAll($conditions = array(), $filetrs = array(), $page = 1, $per_page = 20)
    {
//        var_dump(($page));die;
        $q = $this->db->from('products');
        $q->select('
            products.id as id,
            products.name as name,
            products.artikul as artikul,
            products.image_small as image_small,
            products.image_big as image_big,
            products.description as description,
            products.brand_id as brand_id,
            products.rock_id as rock_id,
            categories.name as categories,
            products.new as new,
            products.fan as fan
            ');
        $q->join("categories", "categories.id = collection_id")
            ->limit($per_page)
            ->offset(($page-1) * $per_page)
        ;
        if (isset($conditions['active']))
            $q->where('is_active', 1);
        if (isset($conditions['search']) && $conditions['search'])
            $q->like('artikul', trim($conditions['search']));
        if (isset($filetrs['brand']) && $filetrs['brand'])
            $q->where_in('brand_id', $filetrs['brand']);

        if (isset($filetrs['color']) && $filetrs['color'])
            $q->where_in('color1_id', $filetrs['color']);

        if (isset($filetrs['rock']) && $filetrs['rock'])
            $q->where_in('rock_id', $filetrs['rock']);
        if (isset($filetrs['collection']) && $filetrs['collection'])
            $q->where_in('collection_id', $filetrs['collection']);
if (isset($conditions['sort']))
    if ($conditions['sort'] == 'new') {
        $q->order_by('new','desc');
    }
    else {
        $q->order_by('fan','desc');
    }
        $result = $q->get()->result();
//        var_dump($q->last_query());die;
        return $result;

    }

    public function countAll($conditions = array(), $filetrs = array())
    {
        $q=$this->db->from('products');
        if (isset($conditions['active']))
            $q->where('is_active', 1);
        if (isset($conditions['search']) && $conditions['search'])
            $q->like('artikul', trim($conditions['search']));
        if (isset($filetrs['brand']) && $filetrs['brand'])
            $q->where_in('brand_id', $filetrs['brand']);

        if (isset($filetrs['color']) && $filetrs['color'])
            $q->where_in('color1_id', $filetrs['color']);

        if (isset($filetrs['rock']) && $filetrs['rock'])
            $q->where_in('rock_id', $filetrs['rock']);
        if (isset($filetrs['collection']) && $filetrs['collection'])
            $q->where_in('collection_id', $filetrs['collection']);
        return
            $q->count_all_results();
//        var_dump($q->last_query());die;

    }

    public function search($search)
    {
        return $this->db->select()
            ->from('products')
            ->like('artikul', $search)
            ->order_by('id', 'asc')
            ->get()
            ->result();

    }

    public function getCollections()
    {
        return $this->db->select()
            ->from('categories')
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function getClasses()
    {
        return $this->db->select()
            ->from('classes')
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function getBrands()
    {
        return $this->db->select()
            ->from('brands')
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function getRocks()
    {
        return $this->db->select()
            ->from('rocks')
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function getRockById($id)
    {
        return $this->db->select()
            ->from('rocks')
            ->where('id', $id)
            ->get()
            ->row_array();
    }

    public function getColors()
    {
        return $this->db->select()
            ->from('colors')
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function getColorsById($id)
    {
        return $this->db->select()
            ->from('colors')
            ->where('id', $id)
            ->get()
            ->result_array();
    }

    public function getById($id)
    {
        return $this->db->select('
            products.id as id,
            products.name as name,
            categories.name as collection,
            classes.name as class,
            brands.name as brand,
            rocks.name as rock,
            colors.name as color,
            products.color1_id,
            products.collection_id as collection_id,
            products.artikul,
            products.new,
            products.fan,
            products.description,
            products.image_big,
            products.image_small,
            ')
            ->from('products')
            ->join('categories', 'categories.id = products.collection_id', 'LEFT')
            ->join('classes', 'classes.id = products.class_id', 'LEFT')
            ->join('brands', 'brands.id = products.brand_id', 'LEFT')
            ->join('rocks', 'rocks.id = products.rock_id', 'LEFT')
            ->join('colors', 'colors.id = products.color1_id', 'LEFT')
            ->where('products.id', $id)
            ->get()
            ->row_array();
    }

    public function getShortRelatedById($id)
    {
        return $this->db->select('
            products.id as id,
            products.name as name,
            categories.name as collection,
            products.image_small,
            ')
            ->from('products')
            ->join('categories', 'categories.id = products.collection_id', 'LEFT')
            ->join('classes', 'classes.id = products.class_id', 'LEFT')
            ->join('brands', 'brands.id = products.brand_id', 'LEFT')
            ->join('rocks', 'rocks.id = products.rock_id', 'LEFT')
            ->where('products.id', $id)
            ->get()
            ->row_array();
    }

    public function getImgById($id)
    {
        return $this->db->select('
            products.id as id,
            products.image_big,
            products.image_small,
            ')
            ->from('products')
            ->where('products.id', $id)
            ->get()
            ->row_array();
    }


    public function save($data)
    {

        return $this->db
            ->insert('products', $data);
    }

    public function edit($data, $id)
    {
        return $this->db
            ->where('products.id', $id)
            ->update('products', $data);
    }

    public function deleteById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('products');
        return $query;
    }

    public function checkmArt($str)
    {
        return $this->db->select()
            ->from('products')
            ->where_in('artikul', $str)
            ->get()
            ->result();
    }


}