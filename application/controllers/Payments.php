<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
    }
    public function addCash(){
        $data['customerEmail'] = $this->session->userdata('email');
        $data['customerPhone'] = $this->session->userdata('phone');
        $data['customerName'] = $this->session->userdata('username');
        $data['returnUrl'] = base_url() .'payment-response';
        $data['notifyUrl'] = base_url() .'payment-response';
        $data['orderId'] = 'ORD_'.rand().'_'.$this->session->userdata('user_id').'_MAN';
        
        $this->load->view('payments/add_cash',$data);
    }

    public function response()
    {
        $secretkey = secretKey;
        
        $orderId = $_POST["orderId"];
        $orderAmount = $_POST["orderAmount"];
        $referenceId = $_POST["referenceId"];
        $txStatus = $_POST["txStatus"];
        $paymentMode = $_POST["paymentMode"];
        $txMsg = $_POST["txMsg"];
        $txTime = $_POST["txTime"];
        $signature = $_POST["signature"];
        $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
        $computedSignature = base64_encode($hash_hmac);
        if ($signature == $computedSignature) {
           $this->load->view('payments/response_success',$data);
        } else {
           $this->load->view('payments/response_failure',$data);
        }
    }
    public function request()
    {
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
        $this->load->view('payments/request',$data);
        
    }

}
