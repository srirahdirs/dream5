<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation','encryption']);
        $this->load->model('UserModel');

    }
    public function myProfile($encrypted_user_id = null) {
        
        $data = [];
        $model = new UserModel();
        $data['state_list'] = $model->getStateList();
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));
        $data['encrypted_user_id'] = base64_encode($this->encryption->encrypt($this->session->userdata('user_id')));
       
        if($this->input->post()){
            $user_id = $this->encryption->decrypt(base64_decode($encrypted_user_id));
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('state_id', 'State', 'required');
            $this->form_validation->set_rules('city_id', 'City', 'required');
            if ($this->form_validation->run() == FALSE) { 
               return $this->load->view('users/my_profile',$data);
            } else {
                $model = new UserModel();
                $model->updateUserDetails($user_id);
                redirect('my-profile/'.$encrypted_user_id);
            }
        }
        $this->load->view('users/my_profile',$data);
    }
}
