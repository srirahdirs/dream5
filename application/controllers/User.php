<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation', 'encryption']);
        $this->load->model(['UserModel','Mail_model']);
        if (!$this->session->userdata('login_status')) {
            $allowed = array('forgotPassword', 'resetPassword','setNewPassword','verifyMail','buddyRegister');
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
            $user_id = $this->session->userdata('user_id');
            $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('state_id', 'State', 'required');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
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
        $mailModel = new Mail_model();
        

        if ($this->input->post()) {
            error_reporting(0);
            $email_or_phonenumber = $this->input->post('email_or_phonenumber');
            $user = $model->findByMobileNumber($email_or_phonenumber);
            $find1 = strpos($email_or_phonenumber, '@');
            if($find1 !== false){
                $user = $mailModel->forgotPasswordMail($email_or_phonenumber);
                if($user) {
                    echo 'mail_sent';
                } else {
                    echo 'email_not_exists';
                }
            } elseif(preg_match('/^\d{10}$/',$email_or_phonenumber)) {
                    $user = $model->findByMobileNumber($email_or_phonenumber);
                    if($user) {
                        echo 'mail_sent';
                    } else {
                        echo 'mobile_number_not_exists';
                    }
            } else {
                    echo 'invalid_mobile_or_email';
            }
            
        }
        
    }
    public function setNewPassword($token) {        
        $validateToken = $this->Mail_model->findWithToken($token); 
        $data['token'] = $token;
        if($validateToken) {           
            
            if($this->input->post()){
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
                
                if($this->form_validation->run() == FALSE){  
                    $err = validation_errors();
                    $this->session->set_flashdata('error', $err);
                    return $this->load->view('users/set_new_password',$data);
                } else {
                        $data = array(              
                        'password' => $this->input->post('confirm_password'),               
                        'password_reset_token'=> NULL,               
                        'status'=> 1,               
                        'id' => $validateToken->id,              
                        );
                        if($this->UserModel->changePassword($data)) {
                            $this->session->set_flashdata('success', 'Password sets successfully!.');    
                            return redirect('home');
                        } else {
                            $this->session->set_flashdata('error', 'Something went wrong!, Please Try Again!.');    
                            return redirect('home');
                        }
                    }
            }
            $this->session->set_flashdata('success', 'Token validated');
            return $this->load->view('users/set_new_password',$data);
        } else {
            $this->session->set_flashdata('error','Token expired or invalid');  
            return redirect('home');                  
        }
        $this->load->view('users/set_new_password',$data);
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



   public function verifyMail($token){
        $getData = $this->UserModel->findVerificationToken($token);          
        if($getData) {
            $user_id = $getData->id;            
            $this->UserModel->updateUserStatus($user_id);    
            $this->session->set_flashdata('success', 'Email verified!.');    
            return redirect('home');
        } else {
            $this->session->set_flashdata('error', 'Token Expired or Invalid!.');
            return redirect('home');
        }
       
   }

    public function kyc(){
        $model = new UserModel();
        $data = [];
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));
        $data['encrypted_user_id'] = base64_encode($this->encryption->encrypt($this->session->userdata('user_id')));
        if ($this->input->post() || $_FILES) {

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
    public function sendVerifyMail(){
        $mailModel = new Mail_model();
        $email = $this->session->userdata('email');
        if($mailModel->sendVerifyMail($email)){
            return true;
        }
    }
    public function refer() {
        $model = new UserModel();
        $data = '';
        $this->load->view('users/refer',$data);
    }
    
}
