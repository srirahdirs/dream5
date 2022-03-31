<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

    public function __construct() {
                
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model(['UserModel','Order_model','LoginModel','Mail_model']);
    }

    public function index() {
        if ($this->session->userdata('username')) {
            // $data['transactions_today'] = $this->Order_model->findUserPurchasedHistoryToday($this->session->userdata('user_id'));
            $data['transactions_history'] = $this->Order_model->findUserPurchasedHistory(10, 0 , $this->session->userdata('user_id'));
            $data['withdrawal_history'] = $this->UserModel->findUserWithdrawalHistory(10, 0 , $this->session->userdata('user_id'));
            $data['orders'] = $this->load->view('payments/transactions', $data,TRUE);
            $this->load->view('users/dashboard_session',$data);
        } else {
            $total_user = $this->UserModel->findUsersCount();
            $data['total_user'] = $total_user;
            $this->load->view('users/dashboard',$data);
        }
    }

    public function getCityList() {
        $model = new UserModel();
        $state_code = $this->input->post('state_code');
        echo json_encode($model->getCityList($state_code));
    }

    public function getSelectedCityList() {
        $model = new UserModel();
        $state_code = $this->input->post('state_code');
        $cities = $model->getCityList($state_code);
        $options = '';
        $userCity = '';
        $userDetails = $model->findUserDetails($this->session->userdata('user_id'));
        if ($userDetails) {
            $userCity = $userDetails->city_id;
        }
        foreach ($cities as $city):
            if ($userCity == $city['city_code']) {
                $selected = 'selected=selected';
            } else {
                $selected = '';
            }
            $options .= '<option value="' . $city['city_code'] . '"' . $selected . '>' . $city['city_name'] . '</option>';
        endforeach;
        echo $options;
    }

    public function register() {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|is_unique[users.username]', [
            'required' => '%s is required',
            'is_unique' => '%s already exists.'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', [
            'required' => '%s is required',
            'is_unique' => '%s already exists.'
        ]);

        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|min_length[10]|is_unique[users.mobile_number]|regex_match[/^[0-9]{10}$/]', [
            'required' => '%s is required',
            'is_unique' => '%s already exists.'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', ['required' => '%s is required']);

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            echo json_encode(['error' => $errors]);
        } else {
            $data['username'] = $this->input->post('username',TRUE);
            $data['email'] = $this->input->post('email',TRUE);
            $data['mobile_number'] = $this->input->post('mobile_number',TRUE);
            $data['password'] = $this->input->post('password',TRUE);
            $model = new UserModel();
            $mailModel = new Mail_model();
            if($model->add($data)){
                echo json_encode(['success' => 'Account created successfully.']);
                error_reporting(0);

                $mailModel->sendNewUserMailToAdmin();
                $loginModel = new LoginModel();
                $result = $loginModel->login($data);
                if($mailModel->sendVerifyMail($data['email'])){
                    return true;
                }
                
            } else {
                echo json_encode(['error' => 'Failed.']);
            }
        }
    }
    
    public function login() {
        $this->form_validation->set_rules('username_or_email', 'Username or Email', 'required', [
            'required' => '%s is required',
        ]);

        $this->form_validation->set_rules('login_password', 'Password', 'required', ['required' => '%s is required']);

        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            echo json_encode(['error' => $errors]);
        } else {

            $data['username'] = $this->input->post('username_or_email',TRUE);
            $data['password'] = $this->input->post('login_password',TRUE);
            $loginModel = new LoginModel();
            $result = $loginModel->login($data);
            if (isset($result['failed'])) {
                echo json_encode(['error' => $result['failed']]);
            } else {
                echo json_encode(['success' => 'Login successfully.']);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata(array("user_id", "username", "email", "loginStatus"));
        $this->session->sess_destroy();
        return redirect('home');
    }
    public function refund_policy() {
        $this->load->view('layouts/refund_policy.html');
    }
    public function update_cash_session() {
        $model = new Order_model();
        $balance = $model->getUserBalance($this->session->userdata('user_id'));
        if($balance > 0){
            $this->session->set_userdata('cash',$balance[0]->cash);
        }
    }

}
