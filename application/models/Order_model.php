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
    public function find($id)
    {
        return $this->db->get_where("orders", array("id" => $id))->row(0);
    }
    //transactions
    public function findUserPurchasedHistory($limit, $start,$user_id) {
        return $this->db->order_by('id desc')->limit($limit, $start)->get_where("orders", array("user_id" => $user_id))->result_array(0);
    }
    public function findUserPurchasedHistoryToday($user_id) {
        return $this->db->select('amount')->order_by('id desc')->where('ordered_at > DATE(now())')->get_where("orders", array("user_id" => $user_id))->result_array(0);
    }
    public function findCount($user_id) {
        return $this->db->where('user_id',$user_id)->from("orders")->count_all_results();
    }
    public function getGameDetails($game_id) {
        return $this->db->order_by('id desc')->get_where("games", array("id" => $game_id))->result();
    }
    public function getUserBalance($user_id) {
        return $this->db->select('cash')->get_where("user_wallet", array("user_id" => $user_id))->result();
    }
    public function getUserBettingDetails($game_id) {
        $this->db->select('*');
        $this->db->from('user_games');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('game_id', $game_id);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function viewUserBets($user_id) {
        $this->db->select('*');
        $this->db->order_by('id desc');
        $this->db->from('user_games');
        $this->db->where('user_id', $user_id);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function saveBet($data){
        $this->cashOut($data);
        if($this->db->insert('user_games',$data)) {
            return true;
        } else {
            return false;
        }        
    }
    public function cashOut($data){
        $dataC['user_id'] = $data['user_id'];
        $dataC['game_id'] = $data['game_id'];
        $dataC['cash_out'] = $data['betting_amount'];
        $getCash = $this->getUserBalance($this->session->userdata('user_id'));
        $totalCash = $getCash[0]->cash;
        $dataC['updated_wallet_balance'] = $totalCash - $data['betting_amount'];
        $this->session->set_userdata('cash',$dataC['updated_wallet_balance']);
        $dataW['cash'] = $dataC['updated_wallet_balance'];
        $dataW['user_id'] = $data['user_id'];
        $dataW['updated_at'] = date('Y-m-d h:i:s');
        $this->updateUserWallet($dataW);
        if($this->db->insert('cash_out',$dataC)) {
            return true;
        } else {
            return false;
        }        
    }
    public function updateUserWallet($data){
        $this->db->where('user_id', $data['user_id']);           
        $this->db->update('user_wallet', $data);
    }

}

