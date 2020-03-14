<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BlankPageController extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_blank.php',$data);
        $this->load->view('files/footerscript.php');
    }

}

?>
