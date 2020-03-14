<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 7.2.1 or newer
 *
 * @package     CodeIgniter
 * @author      Mohan Jadhav
 * @copyright   Copyright (c) 2019, codexhunter.
 * @link        http://www.talklessexpressmore.com/myProfile
 * @license     
 * @since       Version 1.0
 */

class OfficesController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('OfficesModel', 'model');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_offices.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get row to Edit
    *@date : 09-03-20
    *@param : Row Id (int)
    *@return : array
    */
    public function editRow(){
        $rowId = $this->input->post('id',true);
        $result = $this->model->getById($rowId);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addRow($rowId = null) {
        $action = $rowId > 0 ? 'updateRow' : 'addRow';
        $formData = $this->input->post('formData');
        $data = json_decode($formData);
        print_r($formData);exit;
        foreach ($data as $key => $value) {
            $values[] = $data[$key]['value'];
            $keys[] = $data[$key]['name'];
        }
        $data = array_combine($keys, $values);
        print_r($data);exit;
        $result = $this->model->$action($rowId,$data);
        echo json_encode($result);
    }

    /**
    *@desc : Activate to In-Active social 
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function activateRow() {
        $rowId = $this->input->post('id',true);
        $status = $this->input->post('status',true) == 1 ? 0 : 1;
        $formData = array('achiv_status' => $status);
        $result = $this->model->activateRow($rowId,$formData);
        echo json_encode($result);
    }
    
    /**
    *@desc : Add social
    *@date : 09-03-2020
    *@param : Form input (string)
    *@return : array
    */

    public function getRows() {
        $list = $this->model->getRows();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row   = array();
            $row[] = $no;
            $row[] = '<img class="img-responsive rowImg" src="'.$val['img_path'].'" alt="'.$val['achiv_name'].'">';
            $row[] = $val['achiv_name'];
            $row[] = $val['achiv_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $row[] = ''
                . '<a class="agile-icon" onclick="activateRow('.$val['row_id'].','.$val['achiv_status'].')" href="#" title="Activate"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editRow('.$val['row_id'].')" href="#" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteRow('.$val['row_id'].')" href="#" title="Delete"><i class="fa fa-trash-o"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => Globals::count_all(),
            "recordsFiltered" => Globals::count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    /**
    *@desc : Delete menu 
    *@date : 01-03-20
    *@param : id(int)
    *@return : array
    */

    public function deleteRow() {
        $rowId = $this->input->post('id',true);
        $this->unLinkImages($rowId);
        $result = $this->model->deleteRow($rowId);
        echo json_encode($result);
    }

    public function unLinkImages($rowId) {
        $result = $this->model->getById($rowId);
        $imageName = explode("/",$result->img_path);
        @unlink('./assets/images/achivement/'.$imageName[8]);
    }

}

?>
