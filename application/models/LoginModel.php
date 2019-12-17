<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    public $error = array();
    public function login($request)
    {
        
        
        $this->user = $this->credentials($request['username'], $request['password']);
        if ($this->user) {
            return $this->setUser();
        } else {
            return $this->failedLogin($request);
        }
        
        return false;
    }
    
    protected function credentials($username, $password)
    {
        $where = "((`username`='".$username."') or (`email` = '".$username."'))";
        $user = $this->db->select('user_wallet.cash,user_wallet.practice_cash,users.*')->join('user_wallet','user_wallet.user_id = users.id','LEFT')->get_where("users",$where)->row(0);
        if($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
    /**
     * Setting session for authenticated user
     */
    protected function setUser()
    {
        $this->user_id = $this->user->id;
        $this->session->set_userdata(array(
            "user_id" => $this->user->id,
            "username" => $this->user->username,
            "email" => $this->user->email,          
            "phone" => $this->user->mobile_number,          
            "cash" => $this->user->cash,          
            "practice_cash" => $this->user->practice_cash,          
            "login_status" => true
        ));
        return 'success';
    }
     protected function failedLogin($request)
    {
        $this->error["failed"] = "Username or Password is Incorrect.";
        return $this->error;
    }

}