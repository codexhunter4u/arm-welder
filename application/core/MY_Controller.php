<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    // global variable
    var $userdata;
    
    public function __construct() {
        parent::__construct();
        //setting the session data to global variable
        $this->userdata['userdata'] = $this->session->userdata('userdata');
        $this->_is_logged_in();
    }

    private function _is_logged_in() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect('loggerController');
        }
    }

}
