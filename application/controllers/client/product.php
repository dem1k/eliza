<?php

class Product extends CI_Controller
{
    var $data = array();
    var $seo;

    function __construct()
    {
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
        $this->data['categories'] = $this->category_model->getAll();
    }

    function index()
    {
        $id = $this->uri->segment(2, '');
        if (!empty($id)) {
            $this->data['id'] = $id;
            $this->data['title'] = 'Elizabeth Plus';
            $this->data['template'] = 'client/product/index_new';
            $this->data['prod'] = $product = $this->product_model->getById($id);
            $this->load->model('images_model');
            $this->data['images'] = $this->images_model->getByProductId($id);
            if (!$this->data['prod']) redirect('/');
            $this->data['related_rings'] = $this->product_model->getRelatedRings($id, $product['category_id'], 3);

            $articles_cats = $this->category_art_model->getAll();
            foreach ($articles_cats as $cat) {
                $article[$cat['name']] = $this->article_model->getByCatId($cat['id']);
            }
            $this->data['articles_f'] = $article;
            if ($this->input->is_ajax_request()) {
                $this->load->view('client/product/ajax_index', $this->data);
            }

            else {

                $this->load->view('/client/main', $this->data);
            }
        } else {
            redirect('/');
        }
    }


}

?>
