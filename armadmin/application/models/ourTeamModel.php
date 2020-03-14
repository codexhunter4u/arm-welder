<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class OurTeamModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getById($rowId)
    {
        $this->db->where('team_id', $rowId);
        $query = $this->db->get('crm_ourteam');
        return $query->row();
    }
    
    public function addTeam($rowId,$request){
        $request['member_status'] = 1;
        if($this->db->insert('crm_ourteam',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Member addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function activateMember($rowId,$formData)
    {   
        $this->db->where('team_id', $rowId);
        if($this->db->update('crm_ourteam',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Member status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    function getTeam()
    {
        Globals::$table = 'crm_ourteam';
        Globals::$column_order = array('team_id', 'member_name', 'member_status'); //set column field database for datatable orderable
        Globals::$column_search = array('team_id', 'member_name', 'member_status'); //set column field database for datatable searchable 
        Globals::$order = array('team_id' => 'desc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateTeam($rowId,$request){
        $this->db->where('team_id', $rowId);
        if($this->db->update('crm_ourteam',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Member updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function deleteTeam($rowId){
        $this->db->where('team_id', $rowId);
        if($this->db->delete('crm_ourteam')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Member deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>