<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    /*
      |--------------------------------------------------------------------------
      | User Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles User's.
      |
     */

    public function __construct() {
        parent::__construct();
        $this->load->model(['Users_model','Order_model','UserModel']);
        $this->load->library(['form_validation', 'email','pagination']);
        $this->load->helper(['form', 'email']);
    }

    /**
     * Display a Index.
     *
     * @return mixed
     */
    public function index() {
        $config["base_url"] = base_url() . "admin/users";
        $config["total_rows"] = $this->Users_model->findCount();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['listData'] = $this->Users_model->get($config["per_page"], $page);


        return $this->load->view('admin/users/list', $data);
    }

    /*
      |--------------------------------------------------------------------------
      | View user
      |--------------------------------------------------------------------------
     */

    public function view($user_id) {
       $model = new Users_model();
       $data['user'] = $model->getUserDetails($user_id);
       $data['user_id'] = $user_id;
       $data['transactions_history'] = $this->Order_model->findUserPurchasedHistory(1000, 0 , $user_id);
       $data['withdrawal_history'] = $this->UserModel->findUserWithdrawalHistory(1000, 0 , $user_id);
       $this->load->view('admin/users/view', $data);
    }
    public function Approve(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->approveUser($user_id);
    }
    public function acceptPAN(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->acceptPAN($user_id);
    }
    public function rejectPAN(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->rejectPAN($user_id);
    }
    public function acceptAddressProof(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->acceptAddressProof($user_id);
    }
    public function rejectAddressProof(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->rejectAddressProof($user_id);
    }
    public function acceptBankAccount(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->acceptBankAccount($user_id);
    }
    public function rejectBankAccount(){
        $user_id = $this->input->post('user_id');
        $model = new Users_model();
        echo $model->rejectBankAccount($user_id);
    }
    /*
      |--------------------------------------------------------------------------
      | Delete user
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $deleteStatus = $this->Users_model->delete($id);
        $this->session->set_flashdata('success', $deleteStatus);
        return redirect('admin/users');
    }

}
