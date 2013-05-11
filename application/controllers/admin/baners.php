<?php
class Baners extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->data['res'] = $this->router->fetch_class();
    }

    var $data = array();

    function index()
    {
        $this->data['template'] = 'admin/baners/list';
        $this->data['baners'] = $this->baner_model->getAll();

        $this->load->view('admin/main', $this->data);
    }

    function create()
    {
        $this->data['template'] = 'admin/baners/create';

//        $this->data['baner_types'] = $this->baner_model->getAllBanerTypes();
        $this->data['baner_places'] = $this->baner_model->getAllBanerPlaces();
        $this->form_validation->set_rules('title', 'Заголовок', 'trim|required|xss_clean');
        $this->form_validation->set_rules('url', 'URL', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('baner_type_id', 'Тип', 'trim|required|xss_clean');
        $this->form_validation->set_rules('baner_place_id', 'Место Банера', 'trim|required|xss_clean');
        $this->form_validation->set_rules('image', 'Картинка', 'trim|xss_clean');

        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            } else {
                $result = array(
                    'title' => set_value('title'),
                    'url' => set_value('url'),
//                    'baner_type_id' => set_value('baner_type_id'),
                    'baner_place_id' => set_value('baner_place_id'),
                    'image' => set_value('image'),
                );
                $this->baner_model->save($result);
                redirect('/admin/baners/');
            }
        }


        $this->load->view('admin/main', $this->data);
    }

    function delete()
    {
        if (!$id = $this->uri->segment(4))
            redirect('/admin/baners/');


        $this->data['res'] = $this->router->fetch_class();
        $this->baner_model->deleteById($id);
        redirect('/admin/baners/');


    }

    function update()
    {
        if (!$id = $this->uri->segment(4))
            redirect('/admin/baners/');
//            var_dump($id);die;
        $this->data['template'] = 'admin/baners/update';
        $this->data['baner'] = $this->baner_model->getById($id);
//        $this->data['baner_types'] = $this->baner_model->getAllBanerTypes();
        $this->data['baner_places'] = $this->baner_model->getAllBanerPlaces();

        $this->form_validation->set_rules('title', 'Заголовок', 'trim|required|xss_clean');
        $this->form_validation->set_rules('url', 'URL', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('baner_type_id', 'Тип', 'trim|required|xss_clean');
        $this->form_validation->set_rules('baner_place_id', 'Место', 'trim|required|xss_clean');
        $this->form_validation->set_rules('image', 'Картинка', 'trim|required|xss_clean');

        if ($this->input->post('action', '') == 'save') {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/main', $this->data);
            } else {
                $result = array(
                    'title' => set_value('title'),
                    'url' => set_value('url'),
//                    'baner_type_id' => set_value('baner_type_id'),
                    'baner_place_id' => set_value('baner_place_id'),
                    'image' => set_value('image'),
                );
                $this->baner_model->save($result);
                redirect('/admin/baners/');
            }
        }


        $this->load->view('admin/main', $this->data);
    }


    function upload()
    {
// HTTP headers for no cache etc
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

// Settings
//$targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
//        var_dump($_SERVER['DOCUMENT_ROOT']);die;
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/';

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