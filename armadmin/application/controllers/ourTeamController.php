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

class OurTeamController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('OurTeamModel', 'tm');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_ourTeam.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get row to Edit
    *@date : 09-03-20
    *@param : Row Id (int)
    *@return : array
    */
    public function editTeam(){
        $rowId = $this->input->post('id',true);
        $result = $this->tm->getById($rowId);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addTeam($rowId = null) {

        $action = $rowId > 0 ? 'updateTeam' : 'addTeam';
        $imagDetails = array(
            'member_name'        =>$this->input->post('member_name',true),
            'member_designation' =>$this->input->post('member_designation',true),
            'member_desc'        =>$this->input->post('member_desc',true),
            'created_on'         => date("Y-m-d h:i:s"),
        );
        
        $this->load->library('upload');
        $config = IMG_UPLOAD;
        $config['upload_path'] = $config['upload_path'].'/ourteam/';
        $this->upload->initialize($config);
        if($_FILES['member_image']['size'] > 0){
            if($this->upload->do_upload("member_image")){
                $data = $this->upload->data(); 
                $fileExt = pathinfo($data['file_name'], PATHINFO_EXTENSION);
                $unique = strtotime(date('y-m-d h:i:s')); 
                $filename = $data['file_path'].'member_'.$unique.'.'.$fileExt;
                rename($data['full_path'],$filename);
                $config['quality']  = '100%';
                $config['filepath'] = $filename;
                $config['width']    = '450';   
                $config['height']   = '350';
                $result = ImgHelper::resizeImage($config);
                $imagDetails['member_img_path'] = base_url('/assets/images/ourteam/'.'member_'.$unique.'.'.$fileExt);
                
                if($result['status']){
                    if($rowId > 0){
                        $this->unLinkImages($rowId); // Unlink Old image
                    }
                    $result = $this->tm->$action($rowId,$imagDetails);
                }
                
            }else{
                $error = $this->upload->display_errors('<p>', '</p>');
                $result= array('responseCode' => -1, 'responseMessage' => $error);
            }
        }else{
            if($rowId > 0){
                $result = $this->tm->$action($rowId,$imagDetails);
            }else{
                $result= array('responseCode' => -1, 'responseMessage' => 'Please select member image');
            }            
        }
        
        echo json_encode($result);
    }

    /**
    *@desc : Activate to In-Active Member 
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function activateMember() {
        $rowId = $this->input->post('id',true);
        $status = $this->input->post('status',true) == 1 ? 0 : 1;
        $formData = array('member_status' => $status);
        $result = $this->tm->activateMember($rowId,$formData);
        echo json_encode($result);
    }
    
    /**
    *@desc : Add member
    *@date : 09-03-2020
    *@param : Form input (string)
    *@return : array
    */

    public function getTeam() {

        $list = $this->tm->getTeam();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row   = array();
            $row[] = $no;
            $row[] = '<img class="img-responsive rowImg" src="'.$val['member_img_path'].'" alt="'.$val['member_name'].'">';
            $row[] = $val['member_name'];
            $row[] = $val['member_designation'];
            $row[] = $val['member_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $image_path = "'".$val['member_img_path']."'";
            $row[] = ''
                . '<a class="agile-icon" onclick="activateMember('.$val['team_id'].','.$val['member_status'].')" href="#" title="Activate"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editTeam('.$val['team_id'].')" href="#" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteTeam('.$val['team_id'].','.$image_path.')" href="#" title="Delete"><i class="fa fa-trash-o"></i></a>';
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

    public function deleteTeam() {
        $rowId = $this->input->post('id',true);
        $this->unLinkImages($rowId);
        $result = $this->tm->deleteTeam($rowId);
        echo json_encode($result);
    }

    public function unLinkImages($rowId) {
        $result = $this->tm->getById($rowId);
        $imageName = explode("/",$result->member_img_path);
        @unlink('./assets/images/ourteam/'.$imageName[8]);
    }

}

?>
