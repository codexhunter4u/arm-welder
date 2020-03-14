<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setRecordsModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insertRoles($data){
        
        if($this->db->insert('crm_role',$data)){
            $response = array('responseCode' => 'Success','responseMessage' => 'Success! User addedd successfully');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return json_encode($response);
    }
}

?>