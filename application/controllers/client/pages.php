<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
        $this->data['categories'] = $this->category_model->getAll();

    }
    function index() {
        $this->data['template']='/client/main/index_new';
        $articles_cats=$this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']]=$this->article_model->getByCatId($cat['id']);
        }

//        $this->data['articles_f']=$article;
        $this->data['products']=$this->product_model->getAll();
//        die(var_dump($this->data));
        $this->load->view('/client/main',$this->data);
    }


}
