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

class ClientController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ClientModel', 'cl');
    }

    /**
    *@desc : Menu details index
    *@date : 01-03-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_client.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get row to Edit
    *@date : 09-03-20
    *@param : Row Id (int)
    *@return : array
    */
    public function editClient(){
        $rowId = $this->input->post('id',true);
        $result = $this->cl->getById($rowId);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-03-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addClient($rowId = null) {

        $action = $rowId > 0 ? 'updateClient' : 'addClient';
        $imagDetails = array(
            'client_name'        =>$this->input->post('client_name',true),
            'client_content' =>$this->input->post('client_content',true),
            'created_on'         => date("Y-m-d h:i:s"),
        );
        
        $this->load->library('upload');
        $config = IMG_UPLOAD;
        $config['upload_path'] = $config['upload_path'].'/client/';
        $this->upload->initialize($config);
        if($_FILES['client_image']['size'] > 0){
            if($this->upload->do_upload("client_image")){
                $data = $this->upload->data(); 
                $fileExt = pathinfo($data['file_name'], PATHINFO_EXTENSION);
                $unique = strtotime(date('y-m-d h:i:s')); 
                $filename = $data['file_path'].'client_'.$unique.'.'.$fileExt;
                rename($data['full_path'],$filename);
                $config['quality']  = '80%';
                $config['filepath'] = $filename;
                $config['width']    = '600';   
                $config['height']   = '550';
                $result = ImgHelper::resizeImage($config);
                $imagDetails['client_img_path'] = base_url('/assets/images/client/'.'client_'.$unique.'.'.$fileExt);
                if($result['status']){
                    if($rowId > 0){
                        $this->unLinkImages($rowId); // Unlink Old image
                    }
                    $result = $this->cl->$action($rowId,$imagDetails);
                }
            }else{
                $error = $this->upload->display_errors('<p>', '</p>');
                $result= array('responseCode' => -1, 'responseMessage' => $error);
            }
        }else{
            if($rowId > 0){
                $result = $this->cl->$action($rowId,$imagDetails);
            }else{
                $result= array('responseCode' => -1, 'responseMessage' => 'Please select client image');
            }            
        }
        
        echo json_encode($result);
    }

    /**
    *@desc : Activate to In-Active Client 
    *@date : 01-03-20
    *@param : null
    *@return : array
    */

    public function activateClient() {
        $rowId = $this->input->post('id',true);
        $status = $this->input->post('status',true) == 1 ? 0 : 1;
        $formData = array('client_status' => $status);
        $result = $this->cl->activateClient($rowId,$formData);
        echo json_encode($result);
    }
    
    /**
    *@desc : Add Client
    *@date : 09-03-2020
    *@param : Form input (string)
    *@return : array
    */

    public function getClient() {

        $list = $this->cl->getClient();
        
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row   = array();
            $row[] = $no;
            $row[] = '<img class="img-responsive rowImg" src="'.$val['client_img_path'].'" alt="'.$val['client_name'].'">';
            $row[] = $val['client_name'];
            $row[] = $val['client_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $image_path = "'".$val['client_img_path']."'";
            $row[] = ''
                . '<a class="agile-icon" onclick="activateClient('.$val['client_id'].','.$val['client_status'].')" href="#" title="Activate"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editClient('.$val['client_id'].')" href="#" title="Edit"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteClient('.$val['client_id'].','.$image_path.')" href="#" title="Delete"><i class="fa fa-trash-o"></i></a>';
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

    public function deleteClient() {
        $rowId = $this->input->post('id',true);
        $this->unLinkImages($rowId);
        $result = $this->cl->deleteClient($rowId);
        echo json_encode($result);
    }

    public function unLinkImages($rowId) {
        $result = $this->cl->getById($rowId);
        $imageName = explode("/",$result->client_img_path);
        @unlink('./assets/images/client/'.$imageName[8]);
    }

}

?>
