<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function saveOrder($data){
        $data['user_id'] = $this->session->userdata('user_id');
        if($this->db->insert('orders',$data)) {
            $this->insertIntoWallet($data['user_id'], $data['amount']);
            return true;
        } else {
            return false;
        }        
    }
    public function insertIntoWallet($user_id,$amount){
        $tbl = $this->db->get_where("user_wallet", array("user_id" => $user_id))->row(0);
        $user_cash = 0;
        if($tbl){
            $user_cash = $tbl->cash;
            $data['cash'] = $user_cash + $amount;
            $this->db->where('user_id', $user_id);           
            $this->db->update('user_wallet', $data);
        } else {        
            $data['created_at'] = date('Y-m-d h:i:s');
            $data['user_id'] = $user_id;                      
            $data['cash'] = $user_cash + $amount;                   
            $this->db->insert('user_wallet', $data);
        }
        $this->session->set_userdata('cash',$data['cash']);
        
        
    }
    public function reloadPracticeChips($user_id){
        $tbl = $this->db->get_where("user_wallet", array("user_id" => $user_id))->row(0);
        if($tbl){               
            $data['practice_cash'] = 10000;
            $this->db->where('user_id', $user_id);           
            $this->db->update('user_wallet', $data);
        } else {        
            $data['created_at'] = date('Y-m-d h:i:s');
            $data['user_id'] = $user_id;                      
            $data['practice_cash'] = 10000;                   
            $this->db->insert('user_wallet', $data);
        }
        $this->session->set_userdata('practice_cash',$data['practice_cash']);
    }

}

