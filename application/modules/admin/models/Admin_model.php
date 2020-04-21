<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
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
    public function find($id)
    {
        return $this->db->get_where("admin", array("id" => $id))->row(0);
        
    }
    

    /**
     * Find all data.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->db->get_where("admin")->result();
    }

   
    public function checkLogin() {    
        $admin = $this->db->get_where("admin", ['email' => $this->input->post('email')])->row(0);
         
        if ($admin) {
            
            if ($admin && password_verify($this->input->post('password'), $admin->password)) {
                            
                $this->session->set_userdata(array(
                    "admin_id" => $admin->id,                   
                    "admin_logged_in" => true,
                    
                ));
                return 'valid';
            } else {               
                return 'Invalid Email or Password!.';
            }
        } else {
            return 'Email not found!.';
        }
    }

}