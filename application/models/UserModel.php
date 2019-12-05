<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Find data.
     *
     * @param $id
     * @return mixed
     */
    public function getStateList()
    {
        return $this->db->get_where("all_states")->result_array(0);
    }
    public function getCityList($state_code)
    {
        return $this->db->get_where("all_cities", array("state_code" => $state_code))->result_array();
    }
//    public function find($id)
//    {
//        return $this->db->get_where("users", array("id" => $id))->row(0);
//    }
//    public function findWithEmail($email)
//    {
//        return $this->db->get_where("users", array("email" => $email))->row(0);
//    }
//    public function findWithToken($token)
//    {
//        return $this->db->get_where("users", array("password_reset_token" => $token))->row(0);
//    }
//    public function sendSetPasswordLink($email){
//        
//        $getUserData = $this->findWithEmail($email);
//        $generateToken = $this->generateToken($getUserData->id);
//        
//        if($generateToken){
//            
//            $this->load->library('email');
//            $getUserDetails = $this->find($getUserData->id);
//            $link = 'http://localhost/dwf/resetPassword/';
//            if($_SERVER['SERVER_NAME'] == 'localhost') :
//                $link = 'http://localhost/dwf/resetPassword/';
//            else:                   
//                $link = 'https://projects.omgtech.in/dwf/resetPassword/';
//            endif;
//            $data['link'] = $link.$getUserDetails->password_reset_token;
//            $message = $this->load->view('emailer/resetPassword', $data,  TRUE);
//            $this->email->from('info@leadh.co', 'DWF - Set Your Passsword');
//            $this->email->to($getUserDetails->email);
//            $this->email->subject('DWF - Set Password');
//            $this->email->message($message);
//
//            if($this->email->send()){
//                $this->session->set_flashdata('success', 'Mail sent successfully');
//            } else {
//                $this->session->set_flashdata('error', 'Failed to send email.');
//            }
//            
//            
//        }
//        
//    }
//    public function generateToken($id)
//    {
//        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
//        $data['password_reset_token'] = $token;
//        $this->db->where('id',$id);
//        return $this->db->update('users',$data);        
//    }
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
    public function add($data)
    {        
        if(isset($data["password"])) {
            $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);    
        } else {
            $data["password"] = NULL;
        }           
        $userTbl = $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();

        if($userTbl) {
            $dataUser['user_id'] = $user_id;
            return $this->db->insert('user_details', $dataUser);
        }    
         
    }
    public function setPassword($data)
    {
        return password_hash($data["password"], PASSWORD_BCRYPT);
    }

    /**
     * Edit data.
     *
     * @param $data
     * @return mixed
     */
//    public function editUser($id)
//    {
//        $data = array(
//            'name' => $this->input->post('name'),
//            'email' => $this->input->post('email'),
//            'contact_number' => $this->input->post('contact_number'),            
//            'role_id' => $this->input->post('role_id'),
//            'status' => $this->input->post('status'),          
//        );
//        if($this->input->post('companies')){
//            $this->db->delete('user_companies', array('user_id' => $id));
//            foreach ($this->input->post('companies') as $company) {
//                
//                if($company) {
//                    $dataComp['user_id'] = $id;
//                    $dataComp['company_id'] = $company;
//                    $this->db->insert('user_companies', $dataComp);
//                }
//            }
//        }
//        if($id == 0){
//            return $this->db->insert('users',$data);
//        } else {
//            $this->editRoles($id, $this->input->post('role_id'));
//            $this->db->where('id',$id);
//            return $this->db->update('users',$data);
//        }        
//
//    }
//
//    
    public function delete($id)
    {
        $this->db->where('id',$id);
        $data['status'] = 0;
        $this->db->update('users',$data);
       
    }
    

}