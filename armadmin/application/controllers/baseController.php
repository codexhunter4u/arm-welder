<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends MY_Controller {

    function __construct() {
        parent::__construct();
        AuthHelper::_is_logged_in();
    }

    public function index() {        
        $this->load->view('files/headerscript.php');
        $this->load->view('v_dashboard.php',$this->userdata);
        $this->load->view('files/footerscript.php');
    }

}
