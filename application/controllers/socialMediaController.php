<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SocialMediaController extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('socialMediaModel', 'sm');
    }

    public function index() {
        $this->load->view('files/headerscript.php');
        $this->load->view('v_socialMedia.php', $this->userdata);
        $this->load->view('files/footerscript.php');
    }

    public function get_gmail_details() {

        $list = $this->sm->get_gmail_details();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fb) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $fb->gm_username;
            $row[] = strlen($fb->gm_mailsub) > 50 ? mb_substr($fb->gm_mailsub,0,30).' ...' : $fb->gm_mailsub;
            $row[] = $fb->gm_from;
            $row[] = $fb->gm_created_date;
            $row[] = ''
                . '<a href="#" onclick="reply_to_mails(1)"><i class="fa fa-reply gmail-icons"></i></a>'
                . '<a href="#" onclick="view_mails(1)"><i class="fa fa-eye gmail-icons"></i></a>'
                . '<input type="hidden" class="is_read" data-rowid="'.$fb->gm_id.'" value="'.$fb->gm_is_read.'">';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => Globals::count_all(),
            "recordsFiltered" => Globals::count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function get_facebook_details() {

        $list = $this->sm->get_facebook_details();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $fb) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $fb->fb_username;
            $row[] = strlen($fb->fb_post) > 50 ? mb_substr($fb->fb_post,0,30).' ...' : $fb->fb_post;
            $row[] = $fb->fb_post_date;
            $row[] = $fb->fb_post_like;
            $row[] = ''
                . '<i class="fa fa-reply gmail-icons" onclick="reply_to_posts()"></i>'
                . '<i class="fa fa-eye gmail-icons" onclick="view_posts()"></i>'
                . '<input type="hidden" class="is_read" data-rowid="'.$fb->fb_id.'" value="'.$fb->fb_is_read.'">';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => Globals::count_all(),
            "recordsFiltered" => Globals::count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
    
    public function view_mails($id) {
        echo $id;
    }

}

?>
