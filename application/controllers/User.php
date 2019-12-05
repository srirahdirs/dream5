<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }
    public function myProfile() {
        $data = [];
        $model = new UserModel();
        $data['state_list'] = $model->getStateList();
        $data['user'] = $model->findUserDetails($this->session->userdata('user_id'));

        $this->load->view('users/my_profile',$data);
    }
    public function updateProfile(){
        echo "<pre>";
        print_r($this->input->post());
        exit;
        $model = new UserModel();
        $model->updateProfile();
    }
}
