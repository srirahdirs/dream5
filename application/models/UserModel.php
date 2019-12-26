<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Find data.
     *
     * @param $id
     * @return mixed
     */
    public function getStateList() {
        return $this->db->get_where("all_states")->result_array(0);
    }

    public function getCityList($state_code) {
        return $this->db->get_where("all_cities", array("state_code" => $state_code))->result_array();
    }

    public function findUserDetails($user_id) {
        return $this->db->select('users.*,ud.*')->join('user_details ud', 'ud.user_id = users.id', 'left')->get_where("users", array("users.id" => $user_id))->row(0);
    }

    public function find($id)
    {
        return $this->db->get_where("users", array("id" => $id))->row(0);
    }
    public function findWithEmail($email)
    {
        return $this->db->get_where("users", array("email" => $email))->row(0);
    }
    public function findByMobileNumber($mobile_number)
    {
        return $this->db->get_where("users", array("mobile_number" => $mobile_number))->row(0);
    }
    public function findByUsername($username)
    {
        return $this->db->get_where("users", array("username" => $username))->row(0);
    }
    public function findWithToken($token)
    {
        return $this->db->get_where("users", array("password_reset_token" => $token))->row(0);
    }
    public function sendSetPasswordLink($email){
        
        $getUserData = $this->findWithEmail($email);
        $generateToken = $this->generateToken($getUserData->id);
        
        if($generateToken){
            
            $this->load->library('email');
            $getUserDetails = $this->find($getUserData->id);
            $link = 'http://localhost/dwf/resetPassword/';
            if($_SERVER['SERVER_NAME'] == 'localhost') :
                $link = 'http://localhost/dwf/resetPassword/';
            else:                   
                $link = 'https://projects.omgtech.in/dwf/resetPassword/';
            endif;
            $data['link'] = $link.$getUserDetails->password_reset_token;
            $message = $this->load->view('emailer/resetPassword', $data,  TRUE);
            $this->email->from('info@leadh.co', 'DWF - Set Your Passsword');
            $this->email->to($getUserDetails->email);
            $this->email->subject('DWF - Set Password');
            $this->email->message($message);

            if($this->email->send()){
                $this->session->set_flashdata('success', 'Mail sent successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to send email.');
            }
            
            
        }
        
    }
    public function generateToken($id)
    {
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
        $data['password_reset_token'] = $token;
        $this->db->where('id',$id);
        return $this->db->update('users',$data);        
    }
//
//    /**
//     * Find all data.
//     *
//     * @return mixed
//     */
//    public function all()
//    {
//        return $this->db->get_where("users")->result();
//    }

    /**
     * Insert data.
     *
     * @param $data
     * @return mixed
     */
    public function add($data) {
        if (isset($data["password"])) {
            $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        } else {
            $data["password"] = NULL;
        }
        $userTbl = $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        if ($userTbl) {
            $dataUser['user_id'] = $user_id;
            return $this->db->insert('user_details', $dataUser);
        }
    }

    public function setPassword($data) {
        return password_hash($data["password"], PASSWORD_BCRYPT);
    }
    public function changePassword($data)
    {
        $this->db->where('id',$data['id']);
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        return $this->db->update('users', $data);
    }
    public function fetchPasswordHashFromDB(){
        $id = $this->session->userdata('user_id');
        $users = $this->db->get_where("users", array("id" => $id))->row(0);
        if($users){
            return $users->password;
        }
    }
    
    /**
     * Edit data.
     *
     * @param $data
     * @return mixed
     */
    public function updateUserDetails($user_id) {
        $dataUserDetails = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'address' => $this->input->post('address'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city_id'),
        );
        $dataU = [];
        if($this->input->post('email')):
            $dataU['email'] = $this->input->post('email');            
        endif;
        if($this->input->post('mobile_number')):
           $dataU['mobile_number'] = $this->input->post('mobile_number');         
        endif;        
        $this->db->where('id', $user_id);
        $this->db->update('users',$dataU);

        $this->db->where('user_id', $user_id);
        $q = $this->db->get('user_details');
        if ($q->num_rows() > 0) {
            $this->db->update('user_details', $dataUserDetails);
        } else {
            $dataUserDetails['user_id'] = $user_id;
            $this->db->insert('user_details', $dataUserDetails);
        }
        return true;
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $data['status'] = 0;
        $this->db->update('users', $data);
    }
    public function saveFiles(){
        $userFile['address_proof'] = $this->input->post('address_proof');
        $userFile['pan_card'] = $this->input->post('pan_card');
        $userFile['bank_proof'] = $this->input->post('bank_proof');
        if ($_FILES) {
            $uploadFolder = FCPATH . 'assets/user_documents' . DIRECTORY_SEPARATOR;
            if (!file_exists($uploadFolder. $this->session->userdata('user_id') . DIRECTORY_SEPARATOR)) {
                mkdir($uploadFolder . DIRECTORY_SEPARATOR . $this->session->userdata('user_id') . DIRECTORY_SEPARATOR, 0777);
            }
            $uploadFolder = $uploadFolder . DIRECTORY_SEPARATOR . $this->session->userdata('user_id') . DIRECTORY_SEPARATOR;
            
            if( count($_FILES["address_proof_file"]["tmp_name"]) > 0 ) {
            //saving address_proof files
                for ($i = 0; $i <= 1; $i++) {
                        $j = $i + 1;
                        $path[] = $_FILES['address_proof_file']['tmp_name'][$i];
                        $type[] = $_FILES['address_proof_file']['type'][$i];

                        $str = rand();
                        $result = md5($str);
                        $fileNameRep = $result . '_' . $_FILES['address_proof_file']['name'][$i];
                        $target = $uploadFolder . $fileNameRep;
                        $temp_name = $_FILES["address_proof_file"]["tmp_name"][$i];
                        $move = move_uploaded_file($temp_name, $target);
                        if ($move) {
                            $userFile['address_proof_file_'.$j] = $fileNameRep;                        
                        }

                }
            }
            if(isset($_FILES['pan_card_file'])):
                //saving pancard files            
                $path[] = $_FILES['pan_card_file']['tmp_name'];
                $type[] = $_FILES['pan_card_file']['type'];

                $str = rand();
                $result = md5($str);
                $fileNameRep = $result . '_' . $_FILES['pan_card_file']['name'];
                $target = $uploadFolder . $fileNameRep;
                $temp_name = $_FILES["pan_card_file"]["tmp_name"];
                $move = move_uploaded_file($temp_name, $target);
                if ($move) {
                    $userFile['pan_card_file'] = $fileNameRep;                        
                }
            endif;
            if(isset($_FILES['bank_proof_file'])):
            //saving bank_proof files            
                $path[] = $_FILES['bank_proof_file']['tmp_name'];
                $type[] = $_FILES['bank_proof_file']['type'];

                $str = rand();
                $result = md5($str);
                $fileNameRep = $result . '_' . $_FILES['bank_proof_file']['name'];
                $target = $uploadFolder . $fileNameRep;
                $temp_name = $_FILES["bank_proof_file"]["tmp_name"];
                $move = move_uploaded_file($temp_name, $target);
                if ($move) {
                    $userFile['bank_proof_file'] = $fileNameRep;                        
                }
            endif;
                    
            
            $this->db->where('user_id', $this->session->userdata('user_id'));
            $this->db->update('user_details', $userFile);
            
            //for loop
            
        } 
    }
}
