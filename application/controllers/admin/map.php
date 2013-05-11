<?php
class Map extends CI_Controller {
    var $data = array();
    var $seo;
    function __construct(){
        parent::__construct();
        $this->data['seo'] = $this->seo_model->getSeo();
    }
    function index() {
        $this->data['template'] = 'admin/map/index';
        $this->data['res'] = $this->router->fetch_class();
        $this->data['map'] = $this->map_model->getAllCities();
        $this->load->view('admin/main', $this->data);
    }
    function create() {
        $this->data['template'] = 'admin/map/create';
        $this->data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('city', 'Путь', 'trim|required|max_length[32]|xss_clean');
        $this->form_validation->set_rules('city_ru', 'Город', 'trim|required|xss_clean');
        $this->form_validation->set_rules('addr', 'Адресная строка', 'trim|xss_clean');
        $this->form_validation->set_rules('addr2', 'Улица, номер дома', 'trim|xss_clean');
        $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean');
        $this->form_validation->set_rules('x', 'Координата Х', 'trim|xss_clean');
        $this->form_validation->set_rules('y', 'Координата Y', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            }else {

                $result=array(
                        'city'=>set_value('city'),
                        'city_ru'=>set_value('city_ru'),
                        'addr'=>set_value('addr'),
                        'addr2'=>set_value('addr2'),
                        'description'=>set_value('description'),
                        'x'=>set_value('x'),
                        'y'=>set_value('y'),
                );
                $this->map_model->save($result);
                redirect('/admin/map/');
            }
        }else {
            $this->load->view('admin/main', $this->data);
        }
    }

    function edit() {
        $id = $this->uri->segment(4);

        if (!empty($id)) {
            $this->data['id']=$id;
            $this->data['template'] = 'admin/map/edit';
            $this->data['map']=$this->map_model->getById($id);
//            var_dump($this->data);die;
            $this->data['res'] = $this->router->fetch_class();
            $this->form_validation->set_rules('city', 'Путь', 'trim|required|max_length[32]|xss_clean');
            $this->form_validation->set_rules('city_ru', 'Город', 'trim|required|xss_clean');
            $this->form_validation->set_rules('addr', 'Адресная строка', 'trim|xss_clean');
            $this->form_validation->set_rules('addr2', 'Улица, номер дома', 'trim|xss_clean');
            $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean');
            $this->form_validation->set_rules('x', 'Координата Х', 'trim|xss_clean');
            $this->form_validation->set_rules('y', 'Координата Y', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $this->data);
                }else {


                    $result=array(
                            'city'=>set_value('city'),
                            'city_ru'=>set_value('city_ru'),
                            'addr'=>set_value('addr'),
                            'addr2'=>set_value('addr2'),
                            'description'=>set_value('description'),
                            'x'=>set_value('x'),
                            'y'=>set_value('y'),
                    );
                    $this->map_model->updateById($result,$id);
                    redirect('/admin/map/');
                }
            }else {
                $this->load->view('admin/main', $this->data);
            }
        }else {
            redirect('/admin/map/');
        }
    }
    function edittext() {
        $this->data['template'] = 'admin/map/edit_text';
        $this->data['text']=$this->map_model->getMapText();
        $this->data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('text', 'текст', 'trim|xss_clean');
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            }else {


                $result=array(
                        'text'=>$this->input->post('text'),
                );
                $this->map_model->updateText($result);
                redirect('/admin/map/');
            }
        }else {
            $this->load->view('admin/main', $this->data);
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