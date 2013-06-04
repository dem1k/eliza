<?php

class Product_model extends CI_Model
{
    /**
     * @param $collention_id
     * @param int $limit = 3
     */
    public function getRelatedRings($id, $category_id, $limit = 3)
    {
        return $this
            ->db->from('products')
            ->where('category_id', $category_id)
            ->where('id <>', $id)
            ->order_by('fan', 'random')
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
    public function getAll($conditions = array(), $filetrs = array(), $page = 1, $per_page = 20,$with_img=true)
    {
//        var_dump(($page));die;
        $q = $this->db->from('products');
        $q->select('
            products.id as id,
            products.name as name,
            products.artikul as artikul,
            products.image_big as image_big,
            products.description as description,
            categories.name as category,
            categories.slug as cat_slug,
            products.price as price'.($with_img?',images.image as image_big':''));
        if($with_img)$q->join("images", "images.product_id = products.id");
        $q->join("categories", "categories.id = category_id")
        ->limit($per_page)
            ->offset(($page - 1) * $per_page);
//        if (isset($conditions['active']))
//            $q->where('is_active', 1);
        if($with_img)$q->where('images.is_first', 1);
        if (isset($conditions['search']) && $conditions['search'])
            $q->like('artikul', trim($conditions['search']));
        if (isset($filetrs['brand']) && $filetrs['brand'])
            $q->where_in('brand_id', $filetrs['brand']);
        if (isset($filetrs['cat_slug']) && $filetrs['cat_slug'])
            $q->where('categories.slug', $filetrs['cat_slug']);

        if (isset($filetrs['category']) && $filetrs['category'])
            $q->where_in('category_id', $filetrs['category']);
        if (isset($conditions['sort']))
            if ($conditions['sort'] == 'new') {
                $q->order_by('new', 'desc');
            }
            else {
                $q->order_by('fan', 'desc');
            }
        $result = $q->get()->result();
//        var_dump($q->last_query());die;
        return $result;

    }

    public function countAll($conditions = array(), $filetrs = array())
    {
        $q = $this->db->from('products');
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
        if (isset($filetrs['category']) && $filetrs['category'])
            $q->where_in('category_id', $filetrs['category']);
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

    public function getCategories()
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



    public function getById($id)
    {
        return $this->db->select('
            products.id as id,
            products.name as name,
            products.category_id as category_id,
            products.artikul,
            products.description,
            products.price,
            ')
            ->from('products')
//            ->join('categories', 'categories.id = products.category_id', 'LEFT')
//            ->join('brands', 'brands.id = products.brand_id', 'LEFT')
            ->where('products.id', $id)
            ->get()
            ->row_array();
    }

    public function getShortRelatedById($id)
    {
        return $this->db->select('
            products.id as id,
            products.name as name,
            categories.name as category,
            ')
            ->from('products')
            ->join('categories', 'categories.id = products.category_id', 'LEFT')
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
            ')
            ->from('products')
            ->where('products.id', $id)
            ->get()
            ->row_array();
    }


    public function save($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
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