<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Article extends CI_Controller {

    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    function index() {
        if($slug=$this->uri->segment(2)) {
            $this->data['articles']=$this->article_model->getByCatSlug($slug);
        }else {
            $this->data['articles']=$this->article_model->getByCatSlug($this->uri->segment(1));
        }
        $this->data['template']='client/article/index';
        $articles_cats=$this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']]=$this->article_model->getByCatId($cat['id']);
        }
        $this->data['articles_f']=$article;
        
        $this->load->view('/client/main',$this->data);
    }
    function show() {
        if($this->uri->segment(1) == 'article') {
            $slug=$this->uri->segment(2);
        }else{
            $slug=$this->uri->segment(1);
        }
        $art = $this->article_model->getBySlug($slug);
//        die(var_dump($art));
        if(!$art ) {
           show_404();
        }
        $this->data['article'] = $art;
        $this->data['template']='client/article/show';
        $articles_cats=$this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']]=$this->article_model->getByCatId($cat['id']);
        }
//        var_dump($art->category_art);die;
        $this->data['artlist']=$this->article_model->getByCatId($art->category_art);
        $this->data['articles_f']=$article;
        $this->load->view('/client/main',$this->data);
    }
    function articles_list() {

        $this->data['template']='/client/article/list';
        $this->data['articles'] = $this->article_model->getAll();
        $this->load->view('/client/main',$this->data);

    }
}