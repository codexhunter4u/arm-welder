<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    // global variable
    var $userdata;
    
    function __construct() {
        parent::__construct();
        /* Setting the session data to global variable
         * Note : Already set in MY_Controller but this controller not extending to MY_Controller
        */
        $this->userdata['userdata'] = $this->session->userdata('userdata');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('loggerController');
        }
    }

    public function index() {        
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_dashboard.php', $data);
        $this->load->view('files/footerscript.php');
    }

}
