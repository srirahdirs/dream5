<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('LoginModel');
    }

    public function index() {
        $this->load->view('users/dashboard');
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Userame', 'required|is_unique[users.username]',[
            'required'      => '%s is required',
            'is_unique'     => '%s already exists.'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',[
            'required'      => '%s is required',
            'is_unique'     => '%s already exists.'
        ]);

        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|min_length[3]|is_unique[users.mobile_number]|regex_match[/^[0-9]{10}$/]',[
            'required'      => '%s is required',
            'is_unique'     => '%s already exists.'
        ]);
        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]',['required'=> '%s is required']);
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            echo json_encode(['error' => $errors]);
        } else {
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['mobile_number'] = $this->input->post('mobile_number');
            $data['password'] = $this->input->post('password');
            $model = new UserModel();
            $model->add($data);
            echo json_encode(['success' => 'Form submitted successfully.']);
        }
    }
    public function login() {
        $this->form_validation->set_rules('username_or_email', 'Username or Email', 'required',[
            'required'      => '%s is required',
        ]);

        $this->form_validation->set_rules('login_password', 'Password', 'required',['required'=> '%s is required']);
        
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            echo json_encode(['error' => $errors]);
        } else { 
            
            $data['username'] = $this->input->post('username_or_email');            
            $data['password'] = $this->input->post('login_password');
            $loginModel = new LoginModel();
            $result = $loginModel->login($data);
            if(isset($result['failed'])) {
                echo json_encode(['error' => $result['failed']]);
            } else {
                echo json_encode(['success' => 'Login successfully.']);
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata(array("user_id", "username","email", "loginStatus"));
        $this->session->sess_destroy();
        return redirect('home');

        return false;
    }

}
