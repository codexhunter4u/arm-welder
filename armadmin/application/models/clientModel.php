<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ClientModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getById($rowId)
    {
        $this->db->where('client_id', $rowId);
        $query = $this->db->get('crm_clients');
        return $query->row();
    }
    
    public function addClient($rowId,$request){
        $request['client_status'] = 1;
        if($this->db->insert('crm_clients',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function activateClient($rowId,$formData)
    {   
        $this->db->where('client_id', $rowId);
        if($this->db->update('crm_clients',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    function getClient()
    {
        Globals::$table = 'crm_clients';
        Globals::$column_order = array('client_id', 'client_name', 'client_status'); //set column field database for datatable orderable
        Globals::$column_search = array('client_id', 'client_name', 'client_status'); //set column field database for datatable searchable 
        Globals::$order = array('client_id' => 'desc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateClient($rowId,$request){
        $this->db->where('client_id', $rowId);
        if($this->db->update('crm_clients',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function deleteClient($rowId){
        $this->db->where('client_id', $rowId);
        if($this->db->delete('crm_clients')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Client deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>