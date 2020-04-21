<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library(['form_validation']);
    }

    public function index() {
        $this->load->view('admin/home/dashboard');
    }

    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin/home');
        }
        $model = new Admin_model();
        if ($this->input->post()) {

            $this->form_validation->set_rules('email', 'Email:', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password:', 'required');
            if ($this->form_validation->run() == FALSE) {
                $err = validation_errors();
                $this->session->set_flashdata('error', $err);
            } else {
                $checkLogin = $model->checkLogin();
                if ($checkLogin === 'valid') {
                    redirect('admin/home');
                    $this->session->set_flashdata('success', 'Logged in successfully');
                } else {
                    $this->session->set_flashdata('error', $checkLogin);
                }
            }
        }
        $this->load->view('admin/home/login');
    }

    public function logout() {
        $this->session->unset_userdata(array("admin_id", 'admin_logged_in'));
        $this->session->sess_destroy();
        redirect('admin/login');
    }

}
