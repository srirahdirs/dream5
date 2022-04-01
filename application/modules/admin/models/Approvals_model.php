<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Approvals_model extends CI_Model {
    protected $convertion_table = 'dollar_to_kes';
    protected $admin_table = 'admin';
    protected $skill_table = 'skills';
    protected $brief_payment_table = 'brief';
    protected $orders_table = 'orders';
    protected $users_table = 'users';
    protected $user_details_table = 'user_details';
    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function findAll() {
        return $this->db->get_where($this->table)->result_array();
    }
    public function getAdmins() {
        return $this->db->get_where($this->admin_table)->result_array();
    }
    public function getUpiPayments() {
        return $this->db->select('orders.*,users.email')->join('users','users.id = orders.user_id')->order_by("id", "DESC")->get_where($this->orders_table)->result_array();
    }
    public function getUsersKyc() {
        return $this->db->select('users.*,ud.*')->join('user_details ud','users.id = ud.user_id')->get_where($this->users_table)->result_array();
    }
    public function getUserGames() {
        return $this->db->select('u.*,ug.*,g.*,g.id as game_id,ug.status as status')->join('users u','u.id = ug.user_id')->join('games g','g.id = ug.game_id')->get_where('user_games ug')->result_array();
    }
    public function getUserGamesById($game_id) {
        return $this->db->select('u.*,ug.*,g.*,g.id as game_id')->join('users u','u.id = ug.user_id')->join('games g','g.id = ug.game_id')->get_where('user_games ug',array('ug.game_id =' => $game_id))->result_array();
    }
    public function getBriefPayment() {
        return $this->db->select('brief.*,business.business,user.first_name as user')->join('business','business.id = brief.business')->join('user','user.id = brief.user')->get_where($this->brief_payment_table)->result_array();
    }
    public function approveBriefPayment($id) {
        $data['payment_status'] = 'approved';
        $this->db->where(['id' => $id]);
        $this->Order_model->insertIntoWallet($data['user_id'], $data['amount']);
        $this->db->update('brief',$data);
    }
    public function approveUpiPayment($order_id) {
        $data['status'] = 'Approved';        
        $this->db->where(['id' => $order_id]);
        $this->db->update($this->orders_table,$data);
        $this->load->model('../../models/Order_model'); 
        $orderDetail = $this->Order_model->find($order_id);
        $user_id = $orderDetail->user_id;
        $amount = $orderDetail->amount;
        $this->Order_model->insertIntoWallet($user_id,$amount);        
        
    }
    public function getUserBalance($user_id) {
        return $this->db->select('cash')->get_where("user_wallet", array("user_id" => $user_id))->result();
    }
    public function updateUserWallet($data){
        $this->db->where('user_id', $data['user_id']);           
        $this->db->update('user_wallet', $data);
    }
    public function setMatchResult($game_id,$winning_team) {
        $data['match_result'] = $winning_team .' won the game';        
        $this->db->where(['id' => $game_id]);
        $this->db->update('games',$data);

        $getRes = $this->getUserGamesById($game_id);
        foreach($getRes as $res):
            if($res['betting_team'] == $winning_team){
                if($this->checkGameResultExists($game_id,$res['user_id']) == '0'){
                    $getCash = $this->getUserBalance($res['user_id']);
                    $totalCash = $getCash[0]->cash;
                    $dataC['updated_wallet_balance'] = $totalCash + $res['final_amount'];
                    $dataC['cash_in'] = $res['final_amount'];

                    $dataW['cash'] = $dataC['updated_wallet_balance'];
                    $dataW['user_id'] = $res['user_id'];
                    $dataW['updated_at'] = date('Y-m-d h:i:s');
                    $this->updateUserWallet($dataW);


                    $dataUG['status'] = 'won';
                    $this->db->where(['game_id' => $game_id]);
                    $this->db->where(['user_id' => $res['user_id']]);
                    $this->db->update('user_games',$dataUG);

                    $dataCH['updated_at'] = date('Y-m-d h:i:s');
                    $dataCH['cash_in'] =  $res['final_amount'];
                    $dataCH['updated_wallet_balance'] =  $dataC['updated_wallet_balance'];;
                    $this->db->where(['game_id' => $game_id]);
                    $this->db->where(['user_id' => $res['user_id']]);
                    $this->db->update('cash_history',$dataCH);
                }
            } else {
                    $getCash = $this->getUserBalance($res['user_id']);
                    $totalCash = $getCash[0]->cash;

                    $dataUG['status'] = 'loss';
                    $this->db->where(['game_id' => $game_id]);
                    $this->db->where(['user_id' => $res['user_id']]);
                    $this->db->update('user_games',$dataUG);

            }
        
        endforeach;
        return true;   
        
    }
    public function checkGameResultExists($game_id,$user_id){
        $this->db->where(['game_id' => $game_id]);
        $this->db->where(['user_id' => $user_id]);
        $winRes = $this->db->select('*')->get_where('user_games',array('game_id'=> $game_id,'user_id' => $user_id,'status' => 'won' ))->result();
        $lossRes = $this->db->select('*')->get_where('user_games',array('game_id'=> $game_id,'user_id' => $user_id,'status' => 'loss' ))->result();
        if($winRes){
            return true;
        } else if($lossRes){
            return true;
        } else{
            return 0;
        }
    }
    public function ApproveKyc($user_id) {
        $data['is_pan_verified'] = 'Yes';        
        $this->db->where(['user_id' => $user_id]);
        $this->db->update($this->user_details_table,$data);
    }
    public function RejectKyc($user_id) {
        $data['is_pan_verified'] = 'Rejected';        
        $this->db->where(['user_id' => $user_id]);
        $this->db->update($this->user_details_table,$data);
    }
    public function deleteAdmin($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->admin_table);
    }
    
    public function getRate() {
        return $this->db->get_where($this->convertion_table)->row();
    }
    public function setRate() {
        $data['kes'] = $this->input->post('kes'); 
        $this->db->truncate($this->convertion_table);
        return $this->db->insert($this->convertion_table,$data);
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

    public function addAdmin() {
        $data = [];
        $data['email'] = $this->input->post('email');     
        $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);     
        $data['status'] = 1;       
        $data['created_at'] = date('Y-m-d h:i:s');
        $data['updated_at'] = date('Y-m-d h:i:s');
        return $this->db->insert($this->admin_table,$data);
    }
    public function getSkills() {
        $this->db->where(['status' => 2]);
        $this->db->or_where(['status' => 3]);
        $this->db->from('skills');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function acceptSkill($id) {
        $data['status'] = 1;
        $this->db->where(['id' => $id]);
        $this->db->update('skills',$data);
    }
    public function rejectSkill($id) {
        $data['status'] = 3;
        $this->db->where(['id' => $id]);
        $this->db->update('skills',$data);
    }

}
