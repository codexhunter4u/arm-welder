<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class socialMediaModel extends CI_Model {

    
    
    
    function __construct() {
        parent::__construct();
    }
    
    function get_gmail_details()
    {
        Globals::$table = 'crm_gmail';
        Globals::$column_order = array('gm_id', 'gm_username','gm_from','gm_mail_date'); //set column field database for datatable orderable
        Globals::$column_search = array('gm_id','gm_username','gm_mailsub','gm_from','gm_mail_date'); //set column field database for datatable searchable 
        Globals::$column_where = array("gm_type"=>"inbox","gm_status"=>"1"); //set column field for where serach clause
        Globals::$order = array('gm_id' => 'desc'); // default order 
        
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }
    
    function get_facebook_details()
    {
        Globals::$table = 'crm_facebook';
        Globals::$column_order = array('fb_id', 'fb_username','fb_post','fb_post_date'); //set column field database for datatable orderable
        Globals::$column_search = array('fb_id','fb_username','fb_post','fb_post_date','fb_post_like'); //set column field database for datatable searchable 
        Globals::$order = array('fb_id' => 'desc'); // default order 
        
        Globals::_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 

}

?>