<?php

class Main extends CI_Controller {

    function index() {

        $this->mybasket->init();
        $basket=$this->mybasket->getBasket();
        $total_prc=$total_qty=0;
        foreach ($basket as $val) {
            $total_qty+=(int) $val['qty'];
            $total_prc+=(float) $val['total_price_uah'];
        }
        $data['basket']=array(
                'basket_total'=>$total_qty,
                'basket_total_price'=>$total_prc
        );

        $data['template']='content';
        $data['popular']=$this->product_model->getMostPopular(9)?$this->product_model->getMostPopular(9):false;
        $data['topMenu']=true;
        $data['sidebar']=$this->category_model->getAll();
        $data['sub_category']=$this->sub_category_model->getAll();
        $data['content']=$this->articles_model->getBySlug('startpage');
        $seo=$this->seo_model->getseo();
        $data['seo']=$seo;
        $this->load->view('/client/main',$data);
    }


}
