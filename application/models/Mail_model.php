<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model {
    protected $user_table = 'users';
    public function __construct() {
        parent::__construct();
        $this->load->library('email');
    }
    
    public function find($id)
    {
        return $this->db->get_where($this->user_table, array("id" => $id))->row(0);
        
    }
    public function findWithEmail($email)
    {
        return $this->db->get_where($this->user_table, array("email" => $email))->row(0);
    }
    public function findWithToken($token)
    {
        return $this->db->get_where($this->user_table, array("password_reset_token" => $token))->row(0);
    }
    
    public function sendVerifyMail($email){
        
        $getUserData = $this->findWithEmail($email);
        $generateToken = $this->generateToken($getUserData->id);
        
        if($generateToken){            
            $getUserDetails = $this->find($getUserData->id);
            $link = 'http://localhost/mangatha_ci/verifyMail/';
            if($_SERVER['SERVER_NAME'] == 'localhost') :
                $link = 'http://localhost/mangatha_ci/verifyMail/';
            else:                   
                $link = base_url().'/verifyMail/';
            endif;
            $data['link'] = $link.$getUserDetails->password_reset_token;
            $data['user'] = $getUserDetails;
            $message = $this->load->view('emailer/verify_mail', $data,  TRUE);
            $this->email->from(email_from, 'DREAM5 - Verify Your Email');
            $this->email->to($getUserDetails->email);
            $this->email->subject('Wohoo! Welcome to the DREAM5 family!');
            $this->email->set_mailtype("html");
            $this->email->message($message);

            if($this->email->send()){
                $this->session->set_flashdata('success', 'Please check mail.');
            } else {
                $this->session->set_flashdata('error', 'Failed to send email.');
            }           
            
        }
        
    }
    public function sendVerifiedMail($email){
        
        $getUserData = $this->findWithEmail($email);       
        $getUserDetails = $this->find($getUserData->id);
        $link = 'http://localhost/mangatha_ci/verifyMail/';
        if($_SERVER['SERVER_NAME'] == 'localhost') :
            $link = 'http://localhost/mangatha_ci/login/';
        else:                   
            $link = base_url().'/login/';
        endif;
        $data['link'] = $link;
        $data['user'] = $getUserDetails;
        $message = $this->load->view('emailer/verified_mail', $data,  TRUE);
        $this->email->from(email_from, 'Wohoo! Welcome to the DREAM5 family!');
        $this->email->to($getUserDetails->email);
        $this->email->subject('DREAM5 - Email Verified Successfully');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        if($this->email->send()){
            $this->session->set_flashdata('success', 'Mail sent successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to send email.');
        }            
        return 1;
    }
   
    public function forgotPasswordMail($email){
        
        $getUserData = $this->findWithEmail($email);       
        $generateToken = $this->generateToken($getUserData->id);
        
        if($generateToken){            
           
            $getUserDetails = $this->find($getUserData->id);
            $link = 'http://localhost/mangatha_ci/set-new-password/';
            if($_SERVER['SERVER_NAME'] == 'localhost') :
                $link = 'http://localhost/mangatha_ci/set-new-password/';
            else:                   
                $link = base_url().'/set-new-password/';
            endif;
            $data['link'] = $link.$getUserDetails->password_reset_token;
            $data['user'] = $getUserDetails;
            $message = $this->load->view('emailer/forgot_password', $data,  TRUE);
            
            $this->email->from(email_from, 'DREAM5 - Reset Password');
            $this->email->to($getUserDetails->email);
            $this->email->subject('DREAM5 - Reset Password');
            $this->email->set_mailtype("html");
            $this->email->message($message);
            $this->email->priority(3);
            
            if($this->email->send()){
                $this->session->set_flashdata('success', 'Mail sent successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to send email.');
            }
        }
        return 1;
    }
    public function generateToken($id)
    {
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
        $data['password_reset_token'] = $token;
        $this->db->where('id',$id);
        return $this->db->update($this->user_table,$data);        
    }
    
}
