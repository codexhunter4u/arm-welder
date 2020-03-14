<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class getRecordsModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    public function getRoles()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->db->get("crm_role");
        $data = [];
        $no = 0;
        foreach($query->result() as $row) {
            $no++;
            $data[] = array(
                $row->role_id = $no,
                $row->role_name
            );
        }
        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );
        return $result;
    }
}

?>