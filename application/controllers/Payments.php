<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(['form_validation', 'pagination']);
        $this->load->model(['UserModel', 'Order_model']);
        if (!$this->session->userdata('user_id')) {            
            $allowed = array('', '');
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('logout');
            }
        }
    }

    public function addCash() {
        $data['customerEmail'] = $this->session->userdata('email');
        $data['customerPhone'] = $this->session->userdata('phone');
        $data['customerName'] = $this->session->userdata('username');
        $data['returnUrl'] = base_url() . 'payment-response';
        $data['notifyUrl'] = base_url() . 'payment-response';
        $data['orderId'] = 'ORD_' . rand() . '_' . $this->session->userdata('user_id') . '_MAN';

        $this->load->view('payments/add_cash', $data);
    }

    public function withdrawCash() {
        $model = new UserModel();
        $data['user'] = $model->findUserDetailsWithWallet($this->session->userdata('user_id'));
        if ($this->input->post()) {
            $this->form_validation->set_rules('amount', 'amount', 'greater_than[199]|less_than[' . $data['user']->cash . ']', array('less_than' => 'Please enter amount below ' . $data['user']->cash, 'greater_than' => 'Please enter amount above 200'));
            if ($data['user']->is_bank_account_verified != 'Yes') {
                $this->form_validation->set_rules('account_number', 'Account Number', 'required|min_length[8]|integer');
                $this->form_validation->set_rules('confirm_account_number', 'Confirm A/C Number', 'matches[account_number]', array('matches' => 'Account Number does not match'));
                $this->form_validation->set_rules('bank_name', 'Bank Name', 'required|min_length[5]');
                $this->form_validation->set_rules('ifsc_code', 'IFSC CODE', 'required|min_length[8]');
            }
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('payments/withdraw_cash', $data);
            } else {
                $model = new UserModel();
                $model->withdrawCash($data['user']);
                $this->session->set_flashdata('success', 'Amount Withdrawal successfully!.');
                redirect('withdraw-cash');
            }
        }
        $this->load->view('payments/withdraw_cash', $data);
    }

    public function withdrawReversal() {
        $model = new UserModel();
        $data['withdrawals'] = $model->findUserWithdrawals($this->session->userdata('user_id'));
        if ($this->input->post()) {
            $model = new UserModel();
            $model->withdrawReversal($this->input->post('id'));
            $this->session->set_flashdata('success', 'Withdrawal revised successfully.');
            return true;
        }
        $this->load->view('payments/withdraw_reversal', $data);
    }

    public function withdrawHistory() {
        $model = new UserModel();
        $config["base_url"] = base_url() . "payments/withdrawHistory";
        $config["total_rows"] = $this->UserModel->findCount($this->session->userdata('user_id'));
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<div clas='pagination-wrapper'><ul class='pagination pagination-success mg-b-0'>";
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '>';
        $config['prev_link'] = '<';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['withdrawal_history'] = $this->UserModel->findUserWithdrawalHistory($config["per_page"], $page , $this->session->userdata('user_id'));
        $this->load->view('payments/withdraw_history', $data);
    }
    public function Transactions() {
        
        $config["base_url"] = base_url() . "payments/transactions";
        $config["total_rows"] = $this->Order_model->findCount($this->session->userdata('user_id'));
        $config["per_page"] = 9;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<div clas='pagination-wrapper'><ul class='pagination pagination-success mg-b-0'>";
        $config['full_tag_close'] = '</ul></div>';
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = '>';
        $config['prev_link'] = '<';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['transactions_history'] = $this->Order_model->findUserPurchasedHistory($config["per_page"], $page , $this->session->userdata('user_id'));
        $this->load->view('payments/transactions', $data);
    }

    public function addPracticeCash() {
        $model = new Order_model();
        $data['practice_chips'] = ($this->session->userdata('practice_cash')) ? $this->session->userdata('practice_cash') : 0;
        if ($this->input->post('reload_chips')) {
            $model->reloadPracticeChips($this->session->userdata('user_id'));
            echo 'success';
        }
        $this->load->view('payments/add_practice_cash', $data);
    }

    public function response() {
        $model = new Order_model();
        $secretkey = secretKey;
        $data['order_id'] = $_POST["orderId"];
        $data['amount'] = $_POST["orderAmount"];
        $data['reference_id'] = $_POST["referenceId"];
        $data['txn_status'] = $_POST["txStatus"];
        $data['payment_mode'] = $_POST["paymentMode"];
        $data['txn_msg'] = $_POST["txMsg"];
        $data['txn_time'] = $_POST["txTime"];
        $data['signature'] = $_POST["signature"];


        if ($model->saveOrder($data)) {
            redirect('home');
        } else {
            redirect('add-cash');
        }
    }

    public function request() {
        $data['secretkey'] = secretKey;
        $data['orderId'] = $this->input->post("orderId");
        $data['orderAmount'] = $this->input->post("orderAmount");
        $data['orderCurrency'] = $this->input->post("orderCurrency");
        $data['orderNote'] = $this->input->post("orderNote");
        $data['customerName'] = $this->input->post("customerName");
        $data['customerPhone'] = $this->input->post("customerPhone");
        $data['customerEmail'] = $this->input->post("customerEmail");
        $data['returnUrl'] = $this->input->post("returnUrl");
        $data['notifyUrl'] = $this->input->post("notifyUrl");
        $this->load->view('payments/request', $data);
    }

}
