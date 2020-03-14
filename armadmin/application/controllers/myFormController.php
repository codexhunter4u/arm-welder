<?php
    
class MyFormController extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('cropImages');
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function post()
    {
        $data = $_POST['image'];
     
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
     
        $data = base64_decode($data);
        $imageName = time().'.png';
        file_put_contents('./assets/images/'.$imageName, $data);
     
        echo 'done';
    }
}