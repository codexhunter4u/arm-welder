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

class AchivementController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('AchivementModel', 'model');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_achivement.php', $data);
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
        $imagDetails = array(
            'achiv_name'        =>$this->input->post('achiv_name',true),
            'achiv_content'         =>$this->input->post('achiv_content',true),
            'created_on'        => date("Y-m-d h:i:s"),
        );
        
        $this->load->library('upload');
        $config = IMG_UPLOAD;
        $config['upload_path'] = $config['upload_path'].'/achivement/';
        $this->upload->initialize($config);
        if($_FILES['upload_img']['size'] > 0){
            if($this->upload->do_upload("upload_img")){
                $data = $this->upload->data(); 
                $fileExt = pathinfo($data['file_name'], PATHINFO_EXTENSION);
                $unique = strtotime(date('y-m-d h:i:s')); 
                $filename = $data['file_path'].'achiv_'.$unique.'.'.$fileExt;
                rename($data['full_path'],$filename);
                $config['quality']  = '80%';
                $config['filepath'] = $filename;
                $config['width']    = '80';   
                $config['height']   = '80';
                $result = ImgHelper::resizeImage($config);
                $imagDetails['img_path'] = base_url('/assets/images/achivement/'.'achiv_'.$unique.'.'.$fileExt);
                if($result['status']){
                    if($rowId > 0){
                        $this->unLinkImages($rowId); // Unlink Old image
                    }
                    $result = $this->model->$action($rowId,$imagDetails);
                }
            }else{
                $error = $this->upload->display_errors('<p>', '</p>');
                $result= array('responseCode' => -1, 'responseMessage' => $error);
            }
        }else{
            if($rowId > 0){
                $result = $this->model->$action($rowId,$imagDetails);
            }else{
                $result= array('responseCode' => -1, 'responseMessage' => 'Please select social image');
            }            
        }
        
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
