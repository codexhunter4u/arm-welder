<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AchivementModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getById($rowId)
    {
        $this->db->where('row_id', $rowId);
        $query = $this->db->get('crm_achivement');
        return $query->row();
    }
    
    public function addRow($rowId,$request){
        $request['achiv_status'] = 1;
        if($this->db->insert('crm_achivement',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function activateRow($rowId,$formData)
    {   
        $this->db->where('row_id', $rowId);
        if($this->db->update('crm_achivement',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    function getRows()
    {
        Globals::$table = 'crm_achivement';
        Globals::$column_order = array('row_id', 'achiv_name', 'achiv_status'); //set column field database for datatable orderable
        Globals::$column_search = array('row_id', 'achiv_name', 'achiv_status,'); //set column field database for datatable searchable 
        Globals::$order = array('row_id' => 'desc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateRow($rowId,$request){
        $this->db->where('row_id', $rowId);
        if($this->db->update('crm_achivement',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function deleteRow($rowId){
        $this->db->where('row_id', $rowId);
        if($this->db->delete('crm_achivement')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>