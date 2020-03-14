<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoggerController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('loggerModel');
    }

    function index() {
        /*
         * After login if someone try for logger controller then redirect to dashboard
         */
        if ($this->session->userdata('is_logged_in')) {
            redirect('baseController');
        }else{
            $this->load->view('v_logger.php');
        }
    }

    public function signUp() {

        $formData = $this->input->post('formData');
        $data = json_decode($formData, TRUE);
        
        foreach ($data as $key => $value) {

            $values[] = $data[$key]['value'];
            $keys[] = $data[$key]['name'];
        }
        
        $data = array_combine($keys, $values);
        unset($data['userConfirmPassword']);
        echo $res = $this->loggerModel->signUp($data);
    }

    public function login() {
        
        $formData = $this->input->post('formData');
        $rememberMe = $this->input->post('rememberMe');
        $data = json_decode($formData, TRUE);

        foreach ($data as $key => $value) {

            $values[] = $data[$key]['value'];
            $keys[] = $data[$key]['name'];
        }

        $data = array_combine($keys, $values);
        $result = $this->loggerModel->login($data, $rememberMe);

        if ($result['responseCode'] === '1') {

            switch ($result['userData']->role_id) {
                case 2:

                    $result['redirect_url'] = 'dashboardController';
                    break;
                case 3:

                    $result['redirect_url'] = 'dashboardController';
                    break;
                default:

                    $result['redirect_url'] = 'baseController';
            }
        }
        //print_r($this->session->userdata());exit;
        echo (json_encode($result));
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('loggerController');
    }

}

?>
