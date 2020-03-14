<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('profileModel', 'pm');
    }

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_profile.php', $data);
        $this->load->view('files/footerscript.php');
    }
}