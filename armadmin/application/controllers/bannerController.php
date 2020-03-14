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

class BannerController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('BannerModel', 'bn');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_banner.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get menu list
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function getActiveBanner(){
        $result = $this->bn->getActiveBanner();
        echo json_encode($result);
    }

    /**
    *@desc : Get row to Edit
    *@date : 09-03-20
    *@param : Row Id (int)
    *@return : array
    */
    public function editBanner(){
        $rowId = $this->input->post('id',true);
        $result = $this->bn->getById($rowId);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addBanner($rowId = null) {

        $action = $rowId > 0 ? 'updateBanner' : 'addBanner';
        $imagDetails = array(
            'banner_caption' =>$this->input->post('banner_caption',true),
            'banner_content' =>$this->input->post('banner_content',true),
            'created_on'     => date("Y-m-d h:i:s"),
        );
        $this->load->library('upload');
        $config = IMG_UPLOAD;
        $config['upload_path'] = $config['upload_path'].'/banner/';
        $this->upload->initialize($config);
        if($_FILES['banner_image']['size'] > 0){
            if($this->upload->do_upload("banner_image")){
                $data = $this->upload->data(); 
                $fileExt = pathinfo($data['file_name'], PATHINFO_EXTENSION);
                $unique = strtotime(date('y-m-d h:i:s')); 
                $filename = $data['file_path'].'banner_'.$unique.'.'.$fileExt;
                rename($data['full_path'],$filename);
                $config['quality']  = '100%';
                $config['filepath'] = $filename;
                $config['width']    = '1140';   
                $config['height']   = '996';
                $result = ImgHelper::resizeImage($config);
                $imagDetails['banner_img_path'] = base_url('/assets/images/banner/'.'banner_'.$unique.'.'.$fileExt);
                
                if($result['status']){
                    if($rowId > 0){
                        $this->unLinkImages($rowId); // Unlink Old image
                    }
                    $result = $this->bn->$action($rowId,$imagDetails);
                }
                
            }else{
                $error = $this->upload->display_errors('<p>', '</p>');
                $result= array('responseCode' => -1, 'responseMessage' => $error);
            }
        }else{
            if($rowId > 0){
                $result = $this->bn->$action($rowId,$imagDetails);
            }else{
                $result= array('responseCode' => -1, 'responseMessage' => 'Please select banner image');
            }            
        }
        
        echo json_encode($result);
    }

    
    /**
    *@desc : Add Banner
    *@date : 09-03-2020
    *@param : Form input (string)
    *@return : array
    */

    public function getBanner() {

        $list = $this->bn->getBanner();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row   = array();
            $row[] = $no;
            $row[] = '<img class="img-responsive rowImg" src="'.$val['banner_img_path'].'" alt="'.$val['banner_caption'].'">';
            $row[] = $val['banner_caption'];
            $row[] = $val['banner_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $image_path = "'".$val['banner_img_path']."'";
            $row[] = ''
                . '<a class="agile-icon" onclick="activateBanner('.$val['banner_id'].','.$val['banner_status'].')" href="#" title="Activate"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editBanner('.$val['banner_id'].')" href="#" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteBanner('.$val['banner_id'].','.$image_path.')" href="#" title="Delete"><i class="fa fa-trash-o"></i></a>';
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

    public function activateBanner() {
        $rowId = $this->input->post('id',true);
        $status = $this->input->post('status',true) == 1 ? 0 : 1;
        $formData = array('banner_status' => $status);
        $result = $this->bn->activateBanner($rowId,$formData);
        echo json_encode($result);
    }

    /**
    *@desc : Delete menu 
    *@date : 01-03-20
    *@param : id(int)
    *@return : array
    */

    public function deleteBanner() {
        $rowId = $this->input->post('id',true);
        $this->unLinkImages($rowId);
        $result = $this->bn->deleteBanner($rowId);
        echo json_encode($result);
    }

    public function unLinkImages($rowId) {
        $result = $this->bn->getById($rowId);
        $imageName = explode("/",$result->banner_img_path);
        @unlink('./assets/images/banner/'.$imageName[8]);
    }

}

?>
