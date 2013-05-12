<?php

class Sub_category extends Controller {

    function sub_category() {
        parent::Controller();
        $this->load->model('admin/sub_category_model', '', true);
        $this->load->model('admin/product_model', '', true);
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    function index() {
        $data['template'] = 'admin/sub_category/view';
        $data['res'] = $this->router->fetch_class();
        $data['categories'] = $this->sub_category_model->getAll();
        $this->load->view('admin/main', $data);
    }
    function subCatList() {
        if(!$id=$this->uri->segment(4)) {
            redirect('/admin/category');
        }
        else {
            $data['catId']=$id;
            $data['template'] = 'admin/sub_category/list';
            $data['res'] = 'category';
            $data['sub_categories'] = $this->sub_category_model->getByCatId($id);
//            var_dump($data);die;
            $this->load->view('admin/main', $data);
        }
    }
    function fromfile() {
        if(!$data['id']=$id=$this->uri->segment(4)) {
            redirect('/admin/category/');
        }
        else {
            $data['template'] = 'admin/sub_category/from_file';
            $data['res'] = 'category';
            if ($this->input->post('action')=='save') {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'xls';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload()) {
                    $data['error'] = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/main', $data);
                }
                else {
                    $data['upload_data'] =$file= $this->upload->data();


                    $this->load->library('PHPExcel');
                    $objPHPExcel = PHPExcel_IOFactory::load($file['full_path']);
                    $objPHPExcel->setActiveSheetIndex(0);
                    $aSheet = $objPHPExcel->getActiveSheet();
                    $myprodArr=array();
                    foreach($aSheet->getRowIterator() as $row) {
                        $cellIterator = $row->getCellIterator();
                        $myRow=array();
                        foreach($cellIterator as $cell) {
                            $myRow[]=$cell->getValue();
                        }
                        $myprodArr[]=$myRow;
                    }

                    $cat=$this->sub_category_model->getCatIdBySubId($id);
                    foreach ($myprodArr as $value) {
                        if($value[1]==NULL ) {
                            echo '----------<br/>';
//                            continue;
                            var_dump($value);
                        } else {
                            $result = array(
                                    'article'=>$value[0],
                                    'name'=>$value[1],
                                    'slug'=>$this->myslug->generateSlug($value[1]),
                                    'description'=>$value[2]?$value[2]:'',
                                    'sort'=>0,
                                    'sub_category'=>$id,
                                    'category'=>$cat->category,
                                    'price_usd'=>$value[4]?$value[4]:0,
                                    'image_big'=>$value[0].'.jpg',
                                    'image_small'=>$value[0].'_s.jpg',
                                    'date'=>date('Y-m-d'),

                            );

                            if(!$upd_id=$this->product_model->update($result)) {

                                echo 'insert<br/>';
                                $this->product_model->save($result);
                            }
                            else {
                                ;
                                var_dump($upd_id);
                                echo 'update<br/>';
                            }
                        }

                    }

                    die;
                    $this->load->view('admin/main', $data);





                }
            }
            $this->load->view('admin/main', $data);
            $id;
        }
    }
    function create() {
        if(!$catId=$this->uri->segment(4)) {
            redirect('/admin/category');
        }else {
            $data['catId']=$catId;
            $data['template'] = 'admin/sub_category/create';
            $data['res'] = $this->router->fetch_class();

            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $data);
                }else {
                    $sub_category=array(
                            'name'=>set_value('name'),
                            'category'=>$catId,
                            'slug'=>$this->myslug->generateSlug(set_value('name'))
                    );
                    $this->sub_category_model->save($sub_category);
                    redirect('/admin/sub_category/subcatlist/'.$catId);
                }
            }else {
                $this->load->view('admin/main', $data);
            }
        }
    }


    function edit() {
        if(!$id=$this->uri->segment(4)) {
            redirect('/admin/category');
        }else {
            $obj=$this->sub_category_model->getById($id);

            $data['template'] = 'admin/sub_category/edit';
            $data['res'] = $this->router->fetch_class();
            $data['name'] = $obj->name;
            $data['id'] = $id;
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');


            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $data);
                }else {
                    $sub_category=array(
                            'name'=>set_value('name'),
                            'slug'=>$this->myslug->generateSlug(set_value('name'))
                    );
                    $this->sub_category_model->updateById($sub_category,$id);
//                    $cat=$this->sub_category_model->getCatIdBySubId($id);
//                    var_dump($obj->category);die;
                    redirect('/admin/sub_category/subcatlist/'.$obj->category);
                }
            }else {
                $this->load->view('admin/main', $data);
            }
        }

    }

    function view() {
        $data['res'] = $this->router->fetch_class();
        if(!$id=$this->uri->segment(4))
            redirect('/admin/sub_category');
        else {
            $data['template'] = 'admin/category/view';
        }
        $this->load->view('admin/main', $data);
    }


    function delete() {
        $subid= $this->uri->segment(4);
        if(!$subid) {
            show_404();
        }
        else {
            $data['template'] = 'admin/sub_category/';
            $data['res'] = $this->router->fetch_class();
            $this->sub_category_model->deleteById($subid);
            redirect('/admin/category/');

        }

    }


    function _remap($method) {
        $this->load->library('authorization');
        $params = null;
        if ($this->uri->segment(5)) {
            $params = $this->uri->segment(5);
        }

        if (!$this->authorization->is_logged_in()) {
            redirect("/admin/auth/login");
        } else {
            check_perms();
            $this->$method($params);
        }
    }
}

?>
