<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SetRecordsController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('setRecordsModel');
    }
    
    /*
     * Service controller. If direct access show show not found found
    */
    public function index(){
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_404.php',$data);
        $this->load->view('files/footerscript.php');
    }

    function insertRoles() {

        $formData = $this->input->post('formData');
        $data = array('role_name' => $formData[0]['value']);
        echo $res = $this->setRecordsModel->insertRoles($data);
    }

}

?>