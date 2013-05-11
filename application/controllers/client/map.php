<?php
class Map extends CI_Controller {


    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    function index() {
        $this->data['template']='client/map/index';

        $this->data['map']=$this->map_model->getMapText('map');





///////////////////////////////////////////////////////////////////////////////
        $articles_cats=$this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']]=$this->article_model->getByCatId($cat['id']);
        }
        $this->data['articles_f']=$article;
        $this->load->view('/client/main',$this->data);

    }
    function city() {
        $slug = $this->uri->segment(2);
        if (empty($slug)|| !$this->map_model->getCityMapBySlug($slug)) {
            redirect('/map/');

        }else {
            $this->data['template']='client/map/city';
            $this->data['city']=$this->map_model->getCityMapBySlug($slug);

        }



///////////////////////////////////////////////////////////////////////////////
        $articles_cats=$this->category_art_model->getAll();
        foreach ($articles_cats as $cat) {
            $article[$cat['name']]=$this->article_model->getByCatId($cat['id']);
        }
        $this->data['articles_f']=$article;
        $this->load->view('/client/main',$this->data);

    }


    function xml_map() {
        header('Content-type: text/xml');
//         <town name="Донецк" url="map/donetsk" x="450" y="200"/>
//         $arr['town']='kiyv';
        $arr=$this->map_model->getAllCities();
        echo '<?xml version="1.0" encoding="utf-8"?>';
        echo '<map>';
        foreach($arr as $val)
            echo    '<town name="'.$val->city_ru.'" url="map/'.$val->city.'" x="'.$val->x.'" y="'.$val->y.'"/>';
        echo '    </map>';
    }
}