<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dem1k
 * Date: 05.09.12
 * Time: 22:57 0669327269
 * To change this template use File | Settings | File Templates.
 */
class Thumb extends CI_Controller{
    function index(){
        $this->load->helper('file');
        $myfiles=get_filenames("./uploads/products");
//        var_dump($myfiles);
        $this->load->library('image_lib');

        $thumbconf['image_library'] = 'gd2';
        $thumbconf['new_image']	= './uploads/products/th/';
        $thumbconf['create_thumb'] = TRUE;
        $thumbconf['width']	 = 188;
        $thumbconf['height']	= 188;
        $thumbconf['quality']	= 50;
        $thumbconf['thumb_marker']	= '';
        $thumbconf['log_threshold']	= '2';

//        var_dump($myfiles);
        foreach($myfiles as $img){
            if ($img=='.' OR $img=='..' ) {
                echo "skip - ".$img."\n";
                continue;
            }
            $thumbconf['source_image']='./uploads/products/'.$img;
            echo '/uploads/products/'.$img."\n";
            $this->image_lib->initialize($thumbconf);

            if ( ! $this->image_lib->resize())
            {
                echo  $this->image_lib->display_errors()."\n";die;
            }

        }
        
    }
}