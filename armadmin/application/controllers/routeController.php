<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RouteController extends MY_Controller {

    function __construct() {
        parent::__construct();
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

    public function viewRoles() {

        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_roles.php', $data);
        $this->load->view('files/footerscript.php');
    }

}
