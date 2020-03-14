<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHelper {

    static function _is_logged_in() {
       
        $CI = &get_instance();
        //load the session library
        $CI->load->library('session');
        //Get current controller to avoid infinite loop
        $controller = $CI->router->class;

        if (!$CI->session->userdata('is_logged_in') && $controller != "LoggerController"){
            redirect('LoggerController/', 'refresh');
        }else{
            redirect('dashboardController');
        }
    }
}
