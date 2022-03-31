<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."third_party/razorpay/Razorpay.php";
include(APPPATH."third_party/razorpay/src/Api.php");

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
    public function depositAmount() {
        $this->load->model('../../modules/admin/models/Upi_model');
        $data['payment_type'] = $this->input->get('payment_type');
        $data['amount'] = $this->input->get('amount');
        $data['user_id'] = $this->session->userdata('user_id');
        $payment_type = $this->Upi_model->findByUpiMethod($data['payment_type']);
        // $data['upi_id']= $payment_type->upi_id;
        $data['upi_id']= 'PayTm';
        $this->load->view('payments/add_cash_upi', $data);
    }
    public function saveReferenceNumber() {
        $this->load->model('../../modules/admin/models/Upi_model');        
        
        $this->Upi_model->saveUserRefNumber();
        $this->session->set_flashdata('success', 'Amount will be added with in 5 - 15 minutes');
        redirect('home');
    }

    public function withdrawCash() {
        $model = new UserModel();
        $data['user'] = $model->findUserDetailsWithWallet($this->session->userdata('user_id'));
        if ($this->input->post()) {
            $user_cash = $data['user']->cash;
            $user_cash = $user_cash + 1;
            $this->form_validation->set_rules('amount', 'amount', 'greater_than[199]|less_than[' . $user_cash . ']', array('less_than' => 'Please enter amount below ' . $data['user']->cash, 'greater_than' => 'Please enter amount above 200'));
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
    public function getPaymentDetails($payment_id){
        
//        $payment_id = 'pay_H238utBQQ5D5fr';
        $url = 'https://api.razorpay.com/v1/payments/'.$payment_id;
        $api = new \Razorpay\Api\Api(RAZOR_PAY_KEY_ID_TEST,RAZOR_PAY_SECRET_TEST);
       
        /* Array Parameter Data */
        
//  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, RAZOR_PAY_KEY_ID_TEST.":".RAZOR_PAY_SECRET_TEST);
        
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result_curl = curl_exec($ch);
        // Closing
        curl_close($ch);
        // Print the return data
        $result = json_decode($result_curl, true);
        return $result;
    }
    public function response() {
        $model = new Order_model();
        
        $data['razorpay_payment_id'] = $_POST["razorpay_payment_id"];
        $result = $this->getPaymentDetails($data['razorpay_payment_id']);
        $data['razorpay_payment_id'] = $result['id'];
        $data['entity'] = $result['entity'];
        $data['amount'] = $result['amount'] / 100;
        $data['currency'] = $result['currency'];
        $data['status'] = $result['status'];
        $data['order_id'] = $result['order_id'];
        $data['description'] = $result['description'];
        $data['email'] = $result['email'];
        $data['mobile_no'] = $result['contact'];
        $data['error_code'] = $result['error_code'];
        $data['error_description'] = $result['error_description'];
        $data['error_source'] = $result['error_source'];
        $data['error_reason'] = $result['error_reason'];
        $data['created_at'] = $result['created_at'];
        $model = new Order_model();
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
    public function Game() {
        //admin model
        $this->load->model('../../modules/admin/models/Games_model');
        
        $config["base_url"] = base_url() . "payments/game";
        $config["total_rows"] = $this->Games_model->findCount();
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

        $data['games'] = $this->Games_model->findAllGames($config["per_page"], $page);
        $model = new Order_model();        
        foreach ($data['games'] as $key => $value) {
            $userDetails = $model->getUserBettingDetails($value['id']);
            if($userDetails){
                $data['games'][$key]['bet_placed'] = 'Yes';
            } else {
                $data['games'][$key]['bet_placed'] = 'No';
            }
            
        }
        $this->load->view('payments/game', $data);
    }
    public function saveBet(){
        $data['game_id'] = $this->input->post('game_id');
        $data['betting_team'] = $this->input->post('betting_team');
        $data['betting_amount'] = $this->input->post('amount');
        $data['final_amount'] = $this->getFinalBetAmount($this->input->post('amount'));
        $data['user_id'] =  $this->session->userdata('user_id');
        $data['status'] = 'placed';
        $model = new Order_model();
        $getCash = $model->getUserBalance($this->session->userdata('user_id'));
        $totalCash = $getCash[0]->cash;
        if($totalCash < $data['betting_amount']){
            echo "low_balance";
        } else{            
            $model->saveBet($data);
            echo "can_bet";

        }
        
    }
    public function viewUserBets(){
        $model = new Order_model();
        $userDetails = $model->viewUserBets($this->session->userdata('user_id'));
        $table = '<div class="table-responsive">
                    <table class="table mg-b-0 tx-13">
                        <thead>
                            <tr>
                                <th class="wd-5p bg_clr_yel">Team</th>
                                <th class="wd-5p bg_clr_yel">Amount</th>
                                <th class="wd-20p bg_clr_yel">Final Amount</th>
                                <th class="wd-5p bg_clr_yel">Status</th>
                                <th class="wd-15p bg_clr_yel">Placed At</th>
                            </tr>
                        </thead>
                        <tbody>';
        foreach ($userDetails as $row):
                $table .= '<tr>';                                    
                $table .= '<td>'.$row['betting_team'] .'</td>';
                $table .= '<td>'.$row['betting_amount'] .'</td>';
                $table .= '<td>'.$row['final_amount'] .'</td>';
                $table .= '<td>'.$row['status'] .'</td>';
                $table .= '<td>'.$row['created_at'] .'</td>';
                $table .= '</tr>';
        endforeach;
        $table .= '</tbody>';
        $table .= '</table>';
        echo $table;
    }
    public function getFinalBetAmount($amount){
        $doubleAmount = $amount * 2;
        $dream5percentage = 10;
        $percentageAmount = ($dream5percentage / 100) * $doubleAmount;
        $finalAmount = $doubleAmount - $percentageAmount;
        return $finalAmount;
    }
    public function getGameDetails(){
        $game_id = $this->input->post('game_id');
        $model = new Order_model();
        $result = $model->getGameDetails($game_id);
        echo json_encode($result); 
    }
    public function checkUserBalance($bet_amount){
        $model = new Order_model();
        $getCash = $model->getUserBalance($this->session->userdata('user_id'));
        $totalCash = $getCash[0]->cash;
        if($totalCash < $bet_amount){
            echo "low_balance";
        } else{
            echo "can_bet";
        }
    }

}
