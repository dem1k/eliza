<?php

class Parametrs extends CI_Controller {
    var $parametrs=array('brands','classes','colors','categories','rocks','category_art');

    function index() {
        $data['template'] = 'admin/parametrs/index';
        $data['res'] = $this->router->fetch_class();
        $this->parametrs=array('brands','classes','colors','categories','rocks');
        $data['parametrs']=$this->parametrs;
        foreach ($this->parametrs as $parametr) {

            $data[$parametr] = $this->parametrs_model->getAllByParametr($parametr);
        }
        $this->load->view('admin/main', $data);
    }

    function create() {
        $parametr=$this->uri->segment(4);
        if(!$parametr && !in_array($parametr, $this->parametrs)) {
            redirect('/admin/parametrs');
        }else {
            $data['parametr']=$parametr;
            $data['template'] = 'admin/parametrs/create';
            $data['res'] = $this->router->fetch_class().'/create';

            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $data);
                }else {
                    $result=array(
                            'name'=>set_value('name'),
                    );
                    $this->parametrs_model-> saveByParametr($parametr,$result);
                    redirect($parametr!='category_art'?'/admin/parametrs/#'.$parametr:'/admin/');
                }
            }else {
                $this->load->view('admin/main', $data);
            }
        }
    }


    function edit() {
        $parametr=$this->uri->segment(4);
        
        if(!$parametr || !in_array($parametr, $this->parametrs)) {
            redirect('/admin/parametrs');
        }else {
            $id= $this->uri->segment(5);
            if(!$id) {
                show_404();
            }else {
                $name=$this->parametrs_model->getByParametrById($parametr,$id);
                $data['parametr']=$parametr;
                $data['template'] = 'admin/parametrs/edit';
                $data['res'] = $this->router->fetch_class();
                $data['name'] = $name[0]["name"];
                $data['id'] = $id;
                $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');


                if ($this->input->post('action', '') == 'save') {
                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('admin/main', $data);
                    }else {
                        $result=array(
                                'name'=>set_value('name'),
                        );
                        $this->parametrs_model->updateByParametrById($parametr,$result,$id);
                        redirect($parametr!='category_art'?'/admin/parametrs/#'.$parametr:'/admin/');
                    }
                }else {
                    $this->load->view('admin/main', $data);
                }
            }

        }
    }



    function delete() {
        $parametr=$this->uri->segment(4);
        if(!$parametr && !in_array($parametr, $this->parametrs)) {
            redirect('/admin/parametrs');
        }else {
            $id= $this->uri->segment(5);
            if(!$id) {
                show_404();
            }
            else {
                $data['template'] = 'admin/catalog/edit_product';
                $data['res'] = $this->router->fetch_class();
                $this->parametrs_model->deleteByParametrById($parametr,$id) ;
                redirect($parametr!='category_art'?'/admin/parametrs/#'.$parametr:'/admin/');
            }

        }
    }


    function _remap($method)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->$method();
    }
}