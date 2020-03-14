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

class LogosController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('logosModel', 'lg');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_logos.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get menu list
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function getActiveLogo(){
        $result = $this->lg->getActiveLogo();
        echo json_encode($result);
    }

    /**
    *@desc : Get row to Edit
    *@date : 09-03-20
    *@param : Row Id (int)
    *@return : array
    */
    public function editLogo(){
        $rowId = $this->input->post('id');
        $result = $this->lg->editLogo($rowId);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addLogos($rowId = null) {

        $action = $rowId > 0 ? 'updateLogos' : 'addLogos';
        $imagDetails = array(
            'created_on' => date("Y-m-d h:i:s"),
            'logo_caption'=>$this->input->post('logo_caption')
        );

        $this->load->library('upload');
        $config = IMG_UPLOAD;
        $config['upload_path'] = $config['upload_path'].'/logos/';
        $this->upload->initialize($config);
        if($this->upload->do_upload("logo_img")){
            $data = $this->upload->data(); 
            $fileExt = pathinfo($data['file_name'], PATHINFO_EXTENSION);
            $filename = $data['file_path'].'logo_'.$rowId.'.'.$fileExt;
            rename($data['full_path'],$filename);
            $config['quality']  = '100%';
            $config['filepath'] = $filename;
            $config['width']    = '400';   
            $config['height']   = '200';
            $result = ImgHelper::resizeImage($config);
            $imagDetails['logo_path'] = base_url('/assets/images/logos/'.'logo_'.$rowId.'.'.$fileExt);
            
            if($result['status']){
                $result = $this->lg->$action($rowId,$imagDetails);
            }
            
        }else{
            $error = $this->upload->display_errors('<p>', '</p>');
            $result= array('Error' => $error);
        }
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Form input (string)
    *@return : array
    */

    public function getlogos() {

        $list = $this->lg->getlogos();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img class="img-responsive rowImg" src="'.$val['logo_path'].'" alt="'.$val['logo_caption'].'">';
            $row[] = $val['logo_caption'];
            $row[] = $val['logo_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $image_path = "'".$val['logo_path']."'";
            $row[] = ''
                . '<a class="agile-icon" onclick="activateLogo('.$val['logo_id'].','.$val['logo_status'].')" href="#"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editLogo('.$val['logo_id'].')" href="#"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteLogo('.$val['logo_id'].','.$image_path.')" href="#"><i class="fa fa-trash-o"></i></a>';
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
    *@desc : Activate to In-Active menu 
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function activateLogo() {
        $rowId = $this->input->post('id');
        $status = $this->input->post('status') == 1 ? 0 : 1;
        $formData = array('logo_status' => $status);
        $result = $this->lg->activateLogo($rowId,$formData);
        echo json_encode($result);
    }

    /**
    *@desc : Delete menu 
    *@date : 01-03-20
    *@param : id(int)
    *@return : array
    */

    public function deleteLogo() {
        $rowId = $this->input->post('id');
        $img_path = $this->input->post('image_path'); 
        $imageName = explode("/",$img_path);
        $result = $this->lg->deleteLogo($rowId);
        @unlink('./assets/images/logos/'.$imageName[8]);
        echo json_encode($result);
    }

}

?>
