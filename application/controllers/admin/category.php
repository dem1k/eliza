<?php

class Category extends CI_Controller
{
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
        $this->data['categories'] = $this->category_model->getAll();
    }

    public function index()
    {
        $this->data['template'] = 'admin/category/main';
        $this->data['res'] = $this->router->fetch_class();
        $this->load->view('admin/main', $this->data);
    }

    function create()
    {
        $this->data['template'] = 'admin/category/create';
        $this->data['res'] = $this->router->fetch_class() . '/create';

        $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            } else {
                $category = array(
                    'name' => set_value('name'),
                    'slug' => $this->my_lib->getSlug(set_value('name')),
                );
                $this->category_model->save($category);
                redirect('/admin/category');
            }
        } else {
            $this->load->view('admin/main', $this->data);
        }
    }

    function edit()
    {
        if (!$id = $this->uri->segment(4)) {
            redirect('/admin/category');
        } else {
            $name = $this->category_model->getById($id);
            $this->data['template'] = 'admin/category/edit';
            $this->data['res'] = $this->router->fetch_class();
            $this->data['name'] = $name[0]["name"];
            $this->data['id'] = $id;
            $this->form_validation->set_rules('name', 'Название', 'trim|required|min_length[1]|max_length[32]|xss_clean');


            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $this->data);
                } else {
                    $category = array(
                        'name' => set_value('name'),
                    );
                    $this->category_model->updateById($category, $id);
                    redirect('/admin/category');
                }
            } else {
                $this->load->view('admin/main', $this->data);
            }
        }

    }

    function view()
    {
        $this->data['res'] = $this->router->fetch_class();
        if (!$id = $this->uri->segment(4))
            redirect('/admin/category');
        else {
            $this->data['template'] = 'admin/category/view';
            $this->data['products'] = $this->category_model->getProductsByCategoryId($id);
        }
        $this->load->view('admin/main', $this->data);
    }


    function delete()
    {
        $id = $this->uri->segment(4);
        if (!$id) {
            show_404();
        }
        else {
            $this->data['template'] = 'admin/catalog/edit_product';
            $this->data['res'] = $this->router->fetch_class();
            $this->category_model->deleteById($id);
            redirect('/admin/category/');

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