<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upi_model extends CI_Model {
    protected $table = 'upi';
    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function findAll() {
        return $this->db->get_where($this->table)->result_array();
    }
    public function findByUpiMethod($upi_method) {
        return $this->db->get_where($this->table,['upi_method' => $upi_method])->row();
    }
    public function find($id) {
        return $this->db->get_where($this->table,['id' => $id])->row();
    }
    // ****************  for pagination
    public function findCount() {
        return $this->db->count_all($this->table);
    }

    //****************  for pagination
    public function get($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function add() {
        $data = [];
        $data['upi_id'] = $this->input->post('upi_id');
        $data['upi_method'] = $this->input->post('upi_method');
        $data['status'] = $this->input->post('status');
        return $this->db->insert($this->table,$data);
    }
    
    public function edit($id)
    {
        $data = [];
        $data['upi_id'] = $this->input->post('upi_id');
        $data['upi_method'] = $this->input->post('upi_method');
        $data['status'] = $this->input->post('status');
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);   
    }
    public function delete($id) {
        $data['status'] = 0;
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);      
    }
    public function saveUserRefNumber() {
        $data = [];
        $data['payment_mode'] = $this->input->post('payment_mode');
        $data['amount'] = $this->input->post('deposit_amount');
        $data['reference_id'] = $this->input->post('reference_number');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['ordered_at'] = date('Y-m-d h:i:s');
        $data['status'] = 'deposited';
        $data['upi_id'] = $this->input->post('upi_id');
        
        $model = new Upi_model();
        $model->sendPaymentMailToAdmin();
        return $this->db->insert('orders',$data);
    }
    public function sendPaymentMailToAdmin(){
        $data = '';
        $message = $this->load->view('emailer/new_payment_to_admin.php',$data,TRUE);
        $config = [
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://ssmtp.googlemail.com',
            'smtp_user' => smtp_user,
            'smtp_pass' => smtp_pass,
            'smtp_port' => '465',
            'smtp_timeout' => '20',
            'validation' => TRUE,
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $admin_list = array(admin_email_1, admin_email_2, admin_email_3);
        $this->email->to($admin_list);
        
        $this->email->from(email_from, 'Hola! New Payment!');
        $this->email->subject('DREAM5 - New UPI payment!');
        $this->email->set_mailtype("html");
        $this->email->message($message);

        $this->email->send();
    }
}
