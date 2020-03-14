<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OurOfficesController extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {        
        $this->load->view('files/headerscript.php');
        $this->load->view('v_our_offices');
        $this->load->view('files/footerscript.php');
    }

}
