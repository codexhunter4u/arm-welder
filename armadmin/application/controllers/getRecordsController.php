<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class GetRecordsController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('getRecordsModel');
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

    function getRoles() {

        $result = $this->getRecordsModel->getRoles();
        echo json_encode($result);
    }

}

?>