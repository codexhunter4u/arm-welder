<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MenusModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getMenuList()
    {
        $query = $this->db->query('SELECT * FROM crm_menu');
        return $query->result();
    }
    
    public function addMenus($request){
        $request['created_on'] = date("Y-m-d h:i:sa");
        $request['menu_status'] = 1;
        if($this->db->insert('crm_menu',$request)){
            $user_id = $this->db->insert_id();
            $response = array('responseCode' => '1','responseMessage' => 'Success! Menu addedd');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }

    function getMenus()
    {
        Globals::$table = 'crm_menu';
        Globals::$column_order = array('menu_id', 'parent_id', 'menu_name', 'menu_status'); //set column field database for datatable orderable
        Globals::$column_search = array('menu_id', 'parent_id', 'menu_name', 'menu_status'); //set column field database for datatable searchable 
        Globals::$order = array('menu_id' => 'asc'); // default order 
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function activateMenu($rowId,$formData)
    {   
        $this->db->where('menu_id', $rowId);
        if($this->db->update('crm_menu',$formData)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Menu status changed');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return $response;
    }

    public function updateMenu($rowId,$request){
        $request['created_on'] = date("Y-m-d h:i:s");
        $this->db->where('menu_id', $rowId);
        if($this->db->update('crm_menu',$request)){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Menu updated');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }

    public function deleteMenu($rowId){
        $this->db->where('menu_id', $rowId);
        if($this->db->delete('crm_menu')){
            $response = array('responseCode' => '1','responseMessage' => 'Success! Menu deleted');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }

        return $response;
    }
}

?>