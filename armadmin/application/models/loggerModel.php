<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loggerModel extends CI_Model {

    function __construct()
    {
        
        parent::__construct();
        $this->load->library('session');
    }

    public function signUp($request){
        
        $userEmail = explode('@', $request['user_email']);
        $userName = explode(' ', $request['user_name']);
        $request['user_name']=$userEmail[0];
        $request['user_firstname']=$userName[0];
        $request['user_lastname']=$userName[1];
        $request['role_id'] = '2';
        $request['user_status'] = '1';
        $request['created_date'] = date("Y-m-d h:i:sa");
        $request['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
        $request['user_password'] = hash_hmac('sha512','salt'.trim($request['user_password']),AUTH_KEY);
        
        $user_gender = !empty($request['Gender']) ? $request['Gender'] : 'Unknow';
        unset($request['Gender']);
        
        if($this->db->insert('crm_users',$request)){
            $user_id = $this->db->insert_id();
            if(!empty($user_id)){
                
                $profile['user_id'] = $user_id;
                $profile['user_firstname']=$userName[0];
                $profile['user_lastname']=$userName[1];
                $profile['user_status'] = '1';
                $profile['user_gender'] = $user_gender;
                $profile['user_email'] = $request['user_email'];
                $profile['created_on'] = date("Y-m-d h:i:sa");
                $profile['modified_on'] = date("Y-m-d h:i:sa");
                $profile['created_by'] = '2';
                
                $this->db->insert('crm_profile',$profile);
            }
            $response = array('responseCode' => '1','responseMessage' => 'Success! User addedd successfully');
        }else{
            $response = array('responseCode' => '-1','responseMessage' => $this->db->_error_message());
        }
        return json_encode($response);
    }

    public function login($request,$cookie){

        $db = get_instance()->db->conn_id;
        $username = mysqli_real_escape_string($db,$request['user_name']);
        $query = $this->db->query("SELECT u.user_id,u.role_id,CONCAT(u.user_firstname,' ',u.user_lastname) AS username,u.user_name,u.user_email,u.user_password,r.role_name FROM crm_users u
        INNER JOIN crm_role r ON r.role_id = u.role_id WHERE (u.user_name = ? OR u.user_email = ?) AND u.user_status = ?",array($username,$username,'1'));
        $result = $query->row();
        $user_password = hash_hmac('sha512','salt'.trim($request['userPassword']),AUTH_KEY);

        if ($query->num_rows() > 0 && $result->user_password == $user_password) {
          
           $this->setgetvalues->setter($result);

           $this->session->set_userdata(array(
                'userdata'  => $result,
                'is_logged_in'   => TRUE
            ));

            setcookie ("rememberMe",TRUE,time()+ (10 * 365 * 24 * 60 * 60));
            $response = array('responseCode' => '1', 'userData' => $result);

        } else {
          
            $response = array('responseCode' => '-1','responseMessage' => 'Username or password not valid');

        }
        return $response;

    }


}

?>