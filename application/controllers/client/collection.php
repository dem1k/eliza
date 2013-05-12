<?php

class Collection extends CI_Controller
{
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    public function products()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : $this->uri->segment(3, 1);
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : $this->uri->segment(4, 20);

        $filter['brand'] = $this->input->get('brand');
        $filter['color'] = $this->input->get('color');
        $filter['rock'] = $this->input->get('rock');
        $filter['collection'] = $this->input->get('collection');
        $conditions['search'] = $this->input->get('search');
        $conditions['sort'] = $this->input->get('sort');
        $conditions['active'] = true;

        $this->data['filters'] = $filter;
        $this->data['conditions'] = $conditions;
        $this->data['products'] = $products = $this->product_model->getAll($conditions, $filter, $page, $per_page);
        $this->data['total_rows'] = $total_rows = $this->product_model->countAll($conditions, $filter);
        $this->data['total_pages'] = $total_pages = round($total_rows / $per_page);
        $this->load->library('My_pages');
        $pager = $this->my_pages;
        $pager->page=$page;
        $pager->total_pages = $total_pages;
        $pages = $pager->pages();
        $this->data['pages'] = $pages;
        $this->data['template'] = 'client/collection/index_new';
        $this->data['title'] = 'Обручалочка';
        $this->data['brands'] = $this->parametrs_model->getAllByParametr('brands');
        $this->data['colors'] = $this->parametrs_model->getAllByParametr('colors');
        $this->data['rocks'] = $this->parametrs_model->getAllByParametr('rocks');
        $this->data['collections'] = $this->parametrs_model->getAllByParametr('categories');
        $articles_cats = $this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']] = $this->article_model->getByCatId($cat['id']);
        }
        $this->data['articles_f'] = $article;
        $this->load->view('/client/main', $this->data);
    }


}
