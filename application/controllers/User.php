<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation', 'encryption']);
        $this->load->model('UserModel');
        if (!$this->session->userdata('login_status')) {
            $allowed = array('forgotPassword', 'resetPassword');
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('home');
            }
        }
    }

    public function myProfile($encrypted_user_id = null) {
        $data = [];
        $model = new UserModel();
        $data['state_list'] = $model->getStateList();
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));
        $data['encrypted_user_id'] = base64_encode($this->encryption->encrypt($this->session->userdata('user_id')));

        if ($this->input->post()) {
            $user_id = $this->encryption->decrypt(base64_decode($encrypted_user_id));
            $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('state_id', 'State', 'required');
            $this->form_validation->set_rules('city_id', 'City', 'required');
            $this->form_validation->set_rules('city_id', 'City', 'required');
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'integer|min_length[3]|is_unique[users.mobile_number]|regex_match[/^[0-9]{10}$/]',array('is_unique' => 'Mobile Number already exists','regex_match'=> 'Mobile Number should contain 10 digits'));
            $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[users.email]',array('is_unique' => 'Email already exists'));
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('users/my_profile', $data);
            } else {
                $model = new UserModel();
                $model->updateUserDetails($user_id);
                redirect('my-profile/' . $encrypted_user_id);
            }
        }
        $this->load->view('users/my_profile', $data);
    }

    public function changePassword($encrypted_user_id = null) {
        $data = [];
        $model = new UserModel();
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));
        $data['encrypted_user_id'] = base64_encode($this->encryption->encrypt($this->session->userdata('user_id')));

        if ($this->input->post()) {

            $this->form_validation->set_rules('current_password', 'Current Password', 'required|callback_current_password');
            $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[3]');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]|min_length[3]');
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('users/change_password', $data);
            } else {

                $data = array(
                    'id' => $this->session->userdata('user_id'),
                    'password' => $this->input->post('confirm_password'),
                    'password_reset_token' => NULL
                );
                $model->changePassword($data);
                redirect('my-profile/' . $encrypted_user_id);
            }
        }
        $this->load->view('users/change_password', $data);
    }
    public function forgotPassword() {
        $data = [];
        $model = new UserModel();
        

        if ($this->input->post()) {
            $email_or_phonenumber = $this->input->post('email_or_phonenumber');
            $find1 = strpos($email_or_phonenumber, '@');
            if($find1 !== false){
                $user = $model->findWithEmail($email_or_phonenumber);
                if($user) {
//                    $this->sendMail($user->email);
                    echo 'mail_sent';
                } else {
                    echo 'email_not_exists';
                }
            } elseif(preg_match('/^\d{10}$/',$email_or_phonenumber)) {
                    $user = $model->findByMobileNumber($email_or_phonenumber);
                    if($user) {
//                        $this->sendMail($user->email);
                        echo 'mail_sent';
                    } else {
                        echo 'mobile_number_not_exists';
                    }
            } else {
                    echo 'invalid_mobile_or_email';
            }
            
        }
        
    }
    public function sendMailI($email,$mobile_number){
        
    }

    public function current_password($current_password) {
        $old_password_db_hash = $this->UserModel->fetchPasswordHashFromDB();
        if (password_verify($current_password, $old_password_db_hash)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('current_password', 'Current Password not matched!');
            return FALSE;
        }
    }
//    public function forgotPassword(){
//        $email = $this->session->userdata('email');
//        $getUserData = $this->UserModel->findWithEmail($email);
//        if($this->UserModel->generateToken($getUserData->id)){
//            $this->data['data'] = $getUserData;
//                $link = 'http://localhost/dwf/resetPassword/';
//                if($_SERVER['SERVER_NAME'] == 'localhost') :
//                    $link = 'http://localhost/dwf/resetPassword/';
//                else:                   
//                    $link = 'https://projects.omgtech.in/dwf/resetPassword/';
//                endif;
//            $this->data['link'] = $link.$getUserData->password_reset_token;
//            
//            $message = $this->load->view('emailer/resetPassword', $this->data,  TRUE);
//            $this->email->from('info@leadh.co', 'DWF - Set Your Passsword');
//            $this->email->to($getUserData->email);
//            $this->email->subject('DWF - Set Password');
//            $this->email->message($message);
//
//            $this->email->send();
// 
//            $this->session->set_flashdata('success', 'Please check Mail!.');
//        }
//        
//    }
//    public function resetPassword($token){
//        $getData = $this->UserModel->findWithToken($token);
//       
//        if($getData) {
//            $data['user'] = $getData;
//            $this->session->set_flashdata('success', 'Token validated!.');    
//            
//            return $this->load->view('admin/user/set_password',$data);
//        } else {
//            $this->session->set_flashdata('error', 'Token Expired or Invalid Credentials!.');
//            return redirect('home');
//        }
//        
//    }
//    public function setPassword(){
//        
//        $this->form_validation->set_rules('password', 'Password', 'required');
//        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
//        if($this->form_validation->run() == FALSE){  
//            $data['user'] = $this->UserModel->find($this->input->post('id'));
//            $this->load->view('admin/user/set_password',$data);
//        } else {
//            $data = array(              
//                'id'=> $this->input->post('id'),               
//                'password'=> $this->input->post('password'),               
//                'password_reset_token'=> NULL,               
//                'status'=> 1,               
//            );
//            if($this->UserModel->setPassword($data)) {
//                $this->session->set_flashdata('success', 'Password sets successfully!.');    
//                return redirect('login');
//            } else {
//                $this->session->set_flashdata('error', 'Something went wrong!, Please Try Again!.');    
//                return redirect('login');
//            }
//        }
//    }
    public function kyc(){
        $model = new UserModel();
        $data = [];
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));
        $data['encrypted_user_id'] = base64_encode($this->encryption->encrypt($this->session->userdata('user_id')));
        if ($this->input->post()) {

            $this->form_validation->set_rules('pan_card', 'Pan Card', 'required');            
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('users/kyc', $data);
            } else {
                $this->session->set_flashdata('success', 'Files uploaded successfully!.');    
                $model->saveFiles();
                redirect('user/kyc');
            }
        }
        $this->load->view('users/kyc', $data);
    }
}
