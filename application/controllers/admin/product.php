<?php

class Product extends CI_Controller {

    public function index() {redirect('/admin/product/productlist/');}



    public function productlist() {
        $page = $this->input->get('page') ? $this->input->get('page') : $this->uri->segment(4, 1);
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : $this->uri->segment(5, 20);
        $conditions['search'] = $this->input->get('search');
        $data['product'] = $this->product_model->getAll($conditions, $filetrs = array(),$page,$per_page);
        $total_rows = $this->product_model->countAll($conditions, $filetrs);
        $total_pages = round($total_rows / $per_page);
        $this->load->library('My_pages');
        $pager = $this->my_pages;
        $pager->page=$page;
        $pager->total_pages = $total_pages;
        $pages = $pager->pages();
        $data['pages'] = $pages;
        $data['template'] = 'admin/product/productlist';
        $data['res'] = $this->router->fetch_class();
        $this->load->view('/admin/main', $data);
    }

    function create() {

        /* @todo REMAKE IMAGE UPLOADER useing thumbs etc...*/
        $data['template'] = 'admin/product/create';
        $data['res'] = $this->router->fetch_class().'/create';
        $data['colors']=$this->product_model->getColors();
        $data['collections']=$this->product_model->getCollections();
        $data['classes']=$this->product_model->getClasses();
        $data['brands']=$this->product_model->getbrands();
        $data['rocks']=$this->product_model->getRocks();
        $this->form_validation->set_rules('name', 'Название', 'trim|min_length[2]|xss_clean');
        $this->form_validation->set_rules('collection', 'Коллекция', 'trim|required|min_length[1]|max_length[2]|numeric|xss_clean');
//        $this->form_validation->set_rules('class', 'Группа товара', 'trim|numeric|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('brand', 'бренд', 'trim|required|numeric|xss_clean|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('color1', 'Цвет бренда ', 'trim|required|numeric|xss_clean|min_length[1]|max_length[2]');
        $this->form_validation->set_rules('rock', 'Вставка', 'trim|required|numeric|xss_clean|max_length[2]');
        $this->form_validation->set_rules('artikul', 'муж. артикул', 'trim|required|xss_clean|callback_art_check');
        $this->form_validation->set_rules('m_weight', 'муж. вес', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('f_weight', 'жен. вес', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('new', 'новинка', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('fan', 'популярность', 'trim|numeric|xss_clean');
        $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean|max_length[128]');
        $this->form_validation->set_rules('image_big', 'картинка', 'trim|xss_clean');
        $this->form_validation->set_rules('image_small', 'картинка', 'trim|xss_clean');


        if ($this->input->post('action', '') == 'save')
            if ($this->form_validation->run()== FALSE) {
                $this->load->view('admin/main',$data);
            }
            else {
                $product=array(
                        'name'=>set_value('name'),
                        'collection_id'=>set_value('collection'),
//                        'class_id'=>set_value('class'),
                        'brand_id'=>set_value('brand'),
                        'rock_id'=>set_value('rock'),
                        'artikul'=>set_value('artikul'),
                        'new'=>set_value('new'),
                        'fan'=>set_value('fan'),
                        'description'=>set_value('description'),
                        'image_big'=>set_value('image_big'),
                        'image_small'=>set_value('image_small'),
                );
                $this->product_model->save($product);
                $data['template'] = 'admin/product/success';
                $this->load->view('admin/main', $data);
        }else {
            $this->load->view('admin/main', $data);
        }

    }
    function edit() {
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $data['id']=$id;
            $data['template'] = 'admin/product/edit';
            $data['res'] = $this->router->fetch_class();
            $data['product']=$product=$this->product_model->getById($id);
            $data['colors']=$this->product_model->getColors();
            $data['collections']=$this->product_model->getCollections();
            $data['classes']=$this->product_model->getClasses();
            $data['brands']=$this->product_model->getbrands();
            $data['rocks']=$this->product_model->getRocks();
            $this->form_validation->set_rules('name', 'Название', 'trim|min_length[2]|xss_clean');
            $this->form_validation->set_rules('collection', 'Коллекция', 'trim|required|min_length[1]|max_length[2]|numeric|xss_clean');
//            $this->form_validation->set_rules('class', 'Группа товара', 'trim|required|numeric|min_length[1]|max_length[2]');
            $this->form_validation->set_rules('brand', 'бренд', 'trim|required|numeric|xss_clean|min_length[1]|max_length[2]');
            $this->form_validation->set_rules('rock', 'Вставка', 'trim|required|numeric|xss_clean|max_length[2]');
            $this->form_validation->set_rules('artikul', 'муж. артикул', 'trim|required|xss_clean');
            $this->form_validation->set_rules('new', 'новинка', 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('fan', 'популярность', 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean|max_length[128]');
            $this->form_validation->set_rules('image_big', 'картинка', 'trim|xss_clean');
            $this->form_validation->set_rules('image_small', 'картинка', 'trim|xss_clean');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main',$data);
                }
                else {
                    $product=array(
                            'name'=>set_value('name'),
                            'collection_id'=>set_value('collection'),
//                            'class_id'=>set_value('class'),
                            'brand_id'=>set_value('brand'),
                            'rock_id'=>set_value('rock'),
                            'artikul'=>set_value('artikul'),
                            'new'=>set_value('new'),
                            'fan'=>set_value('fan'),
                            'description'=>set_value('description'),
                            'image_big'=>set_value('image_big'),
                            'image_small'=>set_value('image_small'),
                    );
                    $this->product_model->edit($product,$id);
                    $data['template'] = 'admin/product/success';
                    $this->load->view('admin/main', $data);
                }
            }else {
                $this->load->view('admin/main', $data);
            }
//            $this->load->view('admin/main', $data);
        }
    }

    function view() {
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $data['template'] = 'admin/product/display';
            $data['res'] = $this->router->fetch_class();
            $data['product']=$product=$this->product_model->getById($id);
//            var_dump($product);die;
            $data['color1']=$this->product_model->getColorsById($product['color1_id']);
            ;
            $this->load->view('admin/main', $data);
        }
        else {
            redirect('/admin/product');
        }
    }

    function delete() {
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $this->product_model->deleteById($id);
            redirect('/admin/product');
        }
        else {
            redirect('/admin/product');
        }
    }
    function art_check($str) {

        if ($this->product_model->checkmArt($str) || $this->product_model->checkfArt($str)) {

            $this->form_validation->set_message('art_check', "<strong> \"{$str}\"</strong> артикул уже есть в базе");
            return FALSE;
        }
        else {
            return TRUE;
        }
    }


    function upload() {
        /**
         * upload.php
         *
         * Copyright 2009, Moxiecode Systems AB
         * Released under GPL License.
         *
         * License: http://www.plupload.com/license
         * Contributing: http://www.plupload.com/contributing
         */

// HTTP headers for no cache etc
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'uploads/products';

//$cleanupTargetDir = false; // Remove old files
//$maxFileAge = 60 * 60; // Temp file age in seconds

// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? $_REQUEST["chunk"] : 0;
        $chunks = isset($_REQUEST["chunks"]) ? $_REQUEST["chunks"] : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

// Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '', $fileName);

// Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

// Create target dir
        if (!file_exists($targetDir))
            @mkdir($targetDir);

// Remove old temp files
        /* this doesn't really work by now

if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
	while (($file = readdir($dir)) !== false) {
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $file;

		// Remove temp files if they are older than the max age
		if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
			@unlink($filePath);
	}

	closedir($dir);
} else
	die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
        */

// Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        var_dump($in) or  die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    fclose($in);
                    fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                fclose($in);
                fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

// Return JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }

    function _remap($method)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->$method();
    }
}