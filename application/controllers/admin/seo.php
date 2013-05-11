<?php
Class Seo extends CI_Controller
{

    function index()
    {
        $data['template'] = 'admin/seo/view';
        $data['res'] = $this->router->fetch_class();
        $this->form_validation->set_rules('title', 'title', 'trim|xss_clean');
        $this->form_validation->set_rules('keywords', 'keywords', 'trim|xss_clean');
        $this->form_validation->set_rules('description', 'description', 'trim|xss_clean');
        $this->form_validation->set_rules('sitename', 'sitename', 'trim|xss_clean');
        $this->form_validation->set_rules('phone', 'phone', 'trim|xss_clean');
        $this->form_validation->set_rules('address', 'address', 'trim|xss_clean');
        $this->form_validation->set_rules('facebook', 'facebook', 'trim|xss_clean');
        $this->form_validation->set_rules('vk', 'vk', 'trim|xss_clean');
        $this->form_validation->set_rules('twitter', 'twitter', 'trim|xss_clean');
        $this->form_validation->set_rules('copy', 'copy', 'trim|xss_clean');
        $seo = $this->seo_model->getSeo();
        $data['seo'] = $seo;
        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $data);
            } else {

                $info = array(
                    'title' => set_value('title'),
                    'keywords' => set_value('keywords'),
                    'description' => set_value('description'),
                    'sitename' => set_value('sitename'),
                    'phone' => set_value('phone'),
                    'address' => set_value('address'),
                    'facebook' => set_value('facebook'),
                    'vk' => set_value('vk'),
                    'twitter' => set_value('twitter'),
                    'copy' => set_value('copy'),

                );
                $this->seo_model->updateSeo($info);
                redirect('/admin/seo');

                $this->load->view('admin/main', $data);
            }
        } else {
            $this->load->view('admin/main', $data);
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