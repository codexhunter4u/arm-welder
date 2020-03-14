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

class MenusController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('menusModel', 'mn');
    }

    /**
    *@desc : Menu details index
    *@date : 01-30-20
    *@param : null
    */

    public function index() {
        $this->load->view('files/headerscript.php');
        $data['user'] = $this->userdata;
        $this->load->view('v_menus.php', $data);
        $this->load->view('files/footerscript.php');
    }

    /**
    *@desc : Get menu list
    *@date : 01-30-20
    *@param : null
    *@return : array
    */

    public function getMenuList(){
        $result = $this->mn->getMenuList();
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-30-20
    *@param : Row Id (int)
    *@return : array
    */

    public function addMenus($rowId = null) {
        $formData = $this->input->post('formData');
        $data = json_decode($formData, TRUE);
        foreach ($data as $key => $value) {
            $values[] = $data[$key]['value'];
            $keys[] = $data[$key]['name'];
        }
        $data = array_combine($keys, $values);
        $result = $this->mn->addMenus($data);
        echo json_encode($result);
    }

    /**
    *@desc : Add menu
    *@date : 01-30-20
    *@param : Form input (string)
    *@return : array
    */

    public function getMenus() {

        $list = $this->mn->getMenus();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $val) {
            $no++;
            $row = array();
            $name = $val['parent_id'] > 0 ? $this->getParentName($val['parent_id'],$list) : ' - ';
            $row[] = $no;
            $row[] = $val['menu_name'];
            $row[] = $name;
            $row[] = $val['menu_status'] == 1 ? '<b class="non-mandetory">Active<b>' : '<b class="mandetory">In-Active<b>';
            $menuName = "'".$val['menu_name']."'";
            $row[] = ''
                . '<a class="agile-icon" onclick="activateMenu('.$val['menu_id'].','.$val['menu_status'].')" href="#"><i class="fa fa-check-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="editMenu('.$val['menu_id'].','.$menuName.','.$val['parent_id'].')" href="#"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;'
                . '<a class="agile-icon" onclick="deleteMenu('.$val['menu_id'].')" href="#"><i class="fa fa-trash-o"></i></a>';
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
    *@desc : Search the Parent menu name 
    *@date : 01-30-20
    *@param : parentId(int),menuList(string)
    *@return : array
    */

    function getParentName($parentId, $menuList) {
        foreach ($menuList as $key => $val) {
            if ($val['menu_id'] === $parentId) {

                return $val['menu_name'];
            }
        }

        return null;
    }

    /**
    *@desc : Activate to In-Active menu 
    *@date : 01-30-20
    *@param : null
    *@return : array
    */

    public function activateMenu() {
        $rowId = $this->input->post('id');
        $status = $this->input->post('status') == 1 ? 0 : 1;
        $formData = array('menu_status' => $status);
        $result = $this->mn->activateMenu($rowId,$formData);
        echo json_encode($result);
    }

    /**
    *@desc : Update menu 
    *@date : 01-30-20
    *@param : rowId(int)
    *@return : array
    */

    public function updateMenu($rowId = null) {
        $formData = $this->input->post('formData');
        $data = json_decode($formData, TRUE);
        foreach ($data as $key => $value) {
            $values[] = $data[$key]['value'];
            $keys[] = $data[$key]['name'];
        }
        $data = array_combine($keys, $values);
        $result = $this->mn->updateMenu($rowId,$data);
        echo json_encode($result);
    }

    /**
    *@desc : Delete menu 
    *@date : 01-30-20
    *@param : id(int)
    *@return : array
    */

    public function deleteMenu() {
        $rowId = $this->input->post('id');
        $result = $this->mn->deleteMenu($rowId);
        echo json_encode($result);
    }
}

?>
