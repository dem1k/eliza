<?php

class Product extends CI_Controller
{
     function __construct()
    {
        parent::__construct();
        $this->data['res'] = 'Product';
    }

    public function index()
    {
        redirect('/admin/product/productlist/');
    }


    public function productlist()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : $this->uri->segment(4, 1);
        $per_page = $this->input->get('per_page') ? $this->input->get('per_page') : $this->uri->segment(5, 20);
        $conditions['search'] = $this->input->get('search');
        $this->data['product'] = $this->product_model->getAll($conditions, $filetrs = array(), $page, $per_page,false);
        $total_rows = $this->product_model->countAll($conditions, $filetrs);
        $total_pages = round($total_rows / $per_page);
        $this->load->library('My_pages');
        $pager = $this->my_pages;
        $pager->page = $page;
        $pager->total_pages = $total_pages;
        $pages = $pager->pages();
        $this->data['pages'] = $pages;
        $this->data['template'] = 'admin/product/product_list';
        $this->load->view('/admin/main', $this->data);
    }

    public function setmainimg()
    {
        $prod_id = is_numeric($this->uri->segment(4)) ? $this->uri->segment(4) : false;
        $img_id = is_numeric($this->uri->segment(5)) ? $this->uri->segment(5) : false;
        if (!$img_id || !$prod_id) {
            return false;
        }
        $this->load->model('images_model');
        try {
            $this->images_model->unsetMain($prod_id);
            $this->images_model->setMain($img_id);
        } catch (Exception $e) {
            var_dump($e->getMessage(), $e->getTrace());
        }
    }

    public function removeimg()
    {
        $img_id = is_numeric($this->uri->segment(4)) ? $this->uri->segment(4) : false;
        if (!$img_id) {
            return false;
        }
        $this->load->model('images_model');
        try {
            $img = $this->images_model->getById($img_id);
            if ($img->image) {

            }
            $this->images_model->deleteById($img_id);

        } catch (Exception $e) {
            var_dump($e->getMessage(), $e->getTrace());
        }
    }


    function create()
    {
        try {

            $this->data['template'] = 'admin/product/product_form';
            $this->data['is_new'] = true;
            $this->data['categories'] = $this->product_model->getCategories();
            $this->data['brands'] = $this->product_model->getBrands();

            $this->form_validation->set_rules('name', 'Название', 'trim|min_length[2]|xss_clean');
            $this->form_validation->set_rules('artikul', 'Артикул', 'trim|xss_clean');
            $this->form_validation->set_rules('price', 'Цена', 'trim|xss_clean');
            $this->form_validation->set_rules('category', 'Категория', 'trim|min_length[1]|max_length[2]|numeric|xss_clean');
            $this->form_validation->set_rules('brand', 'бренд', 'trim|numeric|xss_clean|min_length[1]|max_length[2]');
            $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean|max_length[128]');

            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {

                    $this->load->view('admin/main', $this->data);
                } else {

                    $product = array(
                        'name' => set_value('name'),
                        'slug' => $this->my_lib->getSlug(set_value('name')),
                        'category_id' => set_value('category'),
                        'brand_id' => set_value('brand'),
                        'price' => set_value('price'),
                        'artikul' => set_value('artikul'),
                        'description' => set_value('description'),
                    );
                    $id = $this->product_model->save($product);
                    redirect('admin/product/edit/' . $id);
                }
            } else {

                $this->load->view('admin/main', $this->data);
            }
        } catch (Exception $e) {
            die($e->getMessage() . ':' . $e->getLine());
        }

    }

    function edit()
    {
        $this->load->model('images_model');
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $this->data['id'] = $id;
            $this->data['template'] = 'admin/product/product_form';

            $this->data['product'] = $product = $this->product_model->getById($id);
            $this->data['categories'] = $this->product_model->getCategories();
            $this->data['brands'] = $this->product_model->getBrands();
            $this->data['images'] = $this->images_model->getByProductId($id);
            $this->form_validation->set_rules('name', 'Название', 'trim|min_length[2]|xss_clean');
            $this->form_validation->set_rules('artikul', 'Артикул', 'trim|xss_clean');
            $this->form_validation->set_rules('price', 'Цена', 'trim|xss_clean');
            $this->form_validation->set_rules('category', 'Категория', 'trim|min_length[1]|max_length[2]|numeric|xss_clean');
            $this->form_validation->set_rules('brand', 'бренд', 'trim|numeric|xss_clean|min_length[1]|max_length[2]');
            $this->form_validation->set_rules('description', 'Описание', 'trim|xss_clean|max_length[128]');
            if ($this->input->post('action', '') == 'save') {
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/main', $this->data);
                }
                else {
                    $product = array(
                        'name' => set_value('name'),
                        'price' => set_value('price'),
                        'category_id' => set_value('category'),
                        'brand_id' => set_value('brand'),
                        'artikul' => set_value('artikul'),
                        'description' => set_value('description'),
                    );
                    $this->product_model->edit($product, $id);
                    $this->data['template'] = 'admin/product/success';
                    $this->load->view('admin/main', $this->data);
                }
            } else {
                $this->load->view('admin/main', $this->data);
            }
//            $this->load->view('admin/main', $this->data);
        }
    }

    function view()
    {
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $this->data['template'] = 'admin/product/display';
            $this->data['res'] = $this->router->fetch_class();
            $this->data['product'] = $product = $this->product_model->getById($id);
//            var_dump($product);die;
            $this->data['color1'] = $this->product_model->getColorsById($product['color1_id']);
            ;
            $this->load->view('admin/main', $this->data);
        }
        else {
            redirect('/admin/product');
        }
    }

    function delete()
    {
        $id = $this->uri->segment(4, '');
        if (!empty($id)) {
            $this->product_model->deleteById($id);
            redirect('/admin/product');
        }
        else {
            redirect('/admin/product');
        }
    }

    function art_check($str)
    {

        if ($this->product_model->checkmArt($str) || $this->product_model->checkfArt($str)) {

            $this->form_validation->set_message('art_check', "<strong> \"{$str}\"</strong> артикул уже есть в базе");
            return FALSE;
        }
        else {
            return TRUE;
        }
    }


    function upload()
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $product_id = is_numeric($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
// Settings
//        $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $targetDir = 'uploads/products/' . $product_id;

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

// 5 minutes execution time
        @set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

// Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

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

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

// Create target dir
        if (!file_exists($targetDir))
            @mkdir($targetDir,0777);

// Remove old temp files
        /* if ($cleanupTargetDir) {
            if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            } else {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
        }*/

// Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];

// Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                // Open temp file
                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {

                    // Read binary input stream and append it to temp file
                    $in = @fopen($_FILES['file']['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    } else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                    @fclose($in);
                    @fclose($out);
                    @unlink($_FILES['file']['tmp_name']);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
        } else {
            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                die('3');
                // Read binary input stream and append it to temp file
                $in = @fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                } else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

                @fclose($in);
                @fclose($out);
            } else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

// Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off
            rename("{$filePath}.part", $filePath);
        }
        //saving image to db
        $this->load->model('images_model');
        $product_id = is_numeric($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $img_id = $this->images_model->save(array('product_id' => $product_id, 'image' => $product_id . '/' . $fileName));
        die('{"jsonrpc" : "2.0", "result" : null, "id" : "' . $img_id . '"}');


    }

    function _remap($method)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->$method();
    }
}