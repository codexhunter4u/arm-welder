<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BannerModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getActiveBanner()
    {
        $query =  $this->db->order_by('banner_id', 'DESC')->get_where('crm_banner', array('banner_status' => 1), 1);
        return $query->result();
    }

    public function getById($rowId)
    {
        $this->db->where('banner_id', $rowId);
        $query = $this->db->get('crm_banner');
        return $query->row();
    }
    
    public function addBanner($rowId,$request){
        $request['banner_status'] = 1;
        if($this->db->insert('crm_banner',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Banner addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    function getBanner()
    {
        Globals::$table = 'crm_banner';
        Globals::$column_order = array('banner_id', 'banner_caption', 'banner_status'); //set column field database for datatable orderable
        Globals::$column_search = array('banner_id', 'banner_caption', 'banner_status'); //set column field database for datatable searchable 
        Globals::$order = array('banner_id' => 'desc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function activateBanner($rowId,$formData)
    {   
        $this->db->where('banner_id', $rowId);
        if($this->db->update('crm_banner',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Banner status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function updateBanner($rowId,$request){
        $this->db->where('banner_id', $rowId);
        if($this->db->update('crm_banner',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Banner updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function deleteBanner($rowId){
        $this->db->where('banner_id', $rowId);
        if($this->db->delete('crm_banner')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Banner deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>