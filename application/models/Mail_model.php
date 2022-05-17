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
        $generateToken = $this->generateVerifyToken($getUserData->id);
        
        if($generateToken){            
            $getUserDetails = $this->find($getUserData->id);
            $link = 'http://localhost/dream5/verifyMail/';
            if($_SERVER['SERVER_NAME'] == 'localhost') :
                $link = 'http://localhost/dream5/verifyMail/';
            else:                   
                $link = base_url().'/verifyMail/';
            endif;
            $data['link'] = $link.$getUserDetails->verification_token;
            $data['user'] = $getUserDetails;
            $message = $this->load->view('emailer/verify_mail', $data,  TRUE);

            $config = [
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://ssmtp.googlemail.com',
                'smtp_user' => smtp_user,
                'smtp_pass' => smtp_pass,
                'smtp_port' => '465',
                'smtp_timeout' => '20',
                'validation' => TRUE,
                'newline' => "\r\n"
            ];
            $this->load->library('email', $config);

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
        $link = 'http://localhost/dream5/home/';
        if($_SERVER['SERVER_NAME'] == 'localhost') :
            $link = base_url().'/login/';
        else:                   
            $link = base_url().'/login/';
        endif;
        $data['link'] = $link;
        $data['user'] = $getUserDetails;
        $message = $this->load->view('emailer/verified_mail', $data,  TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

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
            $config = [
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://ssmtp.googlemail.com',
                'smtp_user' => smtp_user,
                'smtp_pass' => smtp_pass,
                'smtp_port' => '465',
                'smtp_timeout' => '20',
                'validation' => TRUE,
                'newline' => "\r\n"
            ];
            $this->load->library('email', $config);
            $this->email->from(email_from, 'DREAM5 - Reset Password');
            $this->email->to($getUserDetails->email);
            $this->email->subject('DREAM5 - Reset Password');
            $this->email->set_mailtype("html");
            $this->email->message($message);
            
            if($this->email->send()){
                $this->session->set_flashdata('success', 'Mail sent successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to send email.');
            }
        }
        return 1;
    }




    public function sendNewUserMailToAdmin(){
        $data = '';
        
        $message = $this->load->view('emailer/new_user_to_admin.php',$data, TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $admin_list = array(admin_email_1, admin_email_2, admin_email_3);
        $this->email->to($admin_list);

        $this->email->from(email_from, 'Wohoo! New user to DREAM5 family!');
        
        $this->email->subject('DREAM5 - New Registration');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        $this->email->send();
        return true;
    }
    public function sendContactUsMailToAdmin($data){
        
        $message = $this->load->view('emailer/contact_us_to_admin.php',$data, TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $admin_list = array(admin_email_1, admin_email_2);
        $this->email->to($admin_list);

        $this->email->from(email_from, 'Hey someone contacted through contact us Form in DREAM5');
        
        $this->email->subject('DREAM5 - Alert U got a Enquery!');
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->send();
        return true;
    }
    public function sendPaymentMailToAdmin(){
        $data = '';
        $message = $this->load->view('emailer/new_payment_to_admin.php',$data,TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $admin_list = array(admin_email_1, admin_email_2, admin_email_3);
        $this->email->to($admin_list);
        
        $this->email->from(email_from, 'Hola! New Payment!');
        $this->email->subject('DREAM5 - New UPI payment!');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        $this->email->send();
    }
    public function sendWithdrawalProcessedMailToUser($user_email){
        $data = '';
        $message = $this->load->view('emailer/new_withdrawal_mail_to_user.php',$data,TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $admin_list = array($user_email);
        $this->email->to($admin_list);
        
        $this->email->from(email_from, 'Wooo! Withdrawal has been processed successfully!');
        $this->email->subject('DREAM5 - Withdrawal');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        $this->email->send();
    }
   
    public function generateToken($id)
    {
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
        $data['password_reset_token'] = $token;
        $this->db->where('id',$id);
        return $this->db->update($this->user_table,$data);        
    }
    public function generateVerifyToken($id)
    {
        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);
        $data['verification_token'] = $token;
        $this->db->where('id',$id);
        return $this->db->update($this->user_table,$data);        
    }
    
}
