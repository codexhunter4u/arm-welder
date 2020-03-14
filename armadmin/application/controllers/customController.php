<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CustomController extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_404.php',$data);
        $this->load->view('files/footerscript.php');
    }

    public function signUp() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_register.php',$data);
        $this->load->view('files/footerscript.php');
    }

}
