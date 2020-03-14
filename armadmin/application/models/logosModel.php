<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LogosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getActiveLogo()
    {
        $query = $this->db->get_where('crm_logo', array('logo_status' => 1), 1);
        return $query->result();
    }

    public function editLogo($rowId)
    {
        $query = $this->db->get_where('crm_logo', array('logo_id' => $rowId), 1);
        return $query->result();
    }
    
    public function addLogos($rowId,$request){

        if($this->db->insert('crm_logo',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Logo addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    function getLogos()
    {
        Globals::$table = 'crm_logo';
        Globals::$column_order = array('logo_id', 'logo_img', 'logo_caption', 'logo_status'); //set column field database for datatable orderable
        Globals::$column_search = array('logo_id', 'logo_img', 'logo_caption', 'logo_status'); //set column field database for datatable orderable
        Globals::$order = array('logo_status' => 'desc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function activateLogo($rowId,$formData)
    {   
        $preUpdate=array('logo_status'=>'0');
        $pre = $this->db->update('crm_logo',$preUpdate);
        $this->db->where('logo_id', $rowId);
        if($this->db->update('crm_logo',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Logo status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function updateLogos($rowId,$request){
        $this->db->where('logo_id', $rowId);
        if($this->db->update('crm_logo',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Logo updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function deleteLogo($rowId){
        $this->db->where('logo_id', $rowId);
        if($this->db->delete('crm_logo')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Logo deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>