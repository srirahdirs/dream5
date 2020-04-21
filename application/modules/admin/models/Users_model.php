<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    protected $table = 'users';
    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function getUserDetails($user_id) {
        return $this->db->select('users.*,all_cities.city_name,all_states.state_name,ud.*')
                        ->join('user_details ud', 'users.id = ud.user_id', 'left')
                        ->join('all_cities', 'ud.city_id = all_cities.city_code', 'left')
                        ->join('all_states', 'ud.state_id = all_states.state_code', 'left')
                        ->get_where($this->table)->row();
    }
    public function findCount() {
        return $this->db->count_all($this->table);
    }
    public function get($limit, $start) {
        return $this->db->select('users.*,user_details.*')
                        ->join('user_details', 'users.id = user_details.user_id', 'left')
                        ->limit($limit, $start)
                        ->get($this->table)->result_array();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->from($this->table);
        $query = $this->db->get()->row(0);
        if ($query->status == 0) {
            $data['status'] = 10;
            $result = 'User is Active';
        } else {
            $data['status'] = 0;
            $result = 'User is Inactive';
        }
        $this->db->where('id', $id);
        if ($this->db->update($this->table, $data)) {
            return $result;
        }
    }
    public function acceptPAN($user_id){
        $data['is_pan_verified'] = 'Yes';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function rejectPAN($user_id){
        $data['is_pan_verified'] = 'Rejected';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function acceptAddressProof($user_id){
        $data['is_address_proof_verified'] = 'Yes';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function rejectAddressProof($user_id){
        $data['is_address_proof_verified'] = 'Rejected';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function acceptBankAccount($user_id){
        $data['is_bank_account_verified'] = 'Yes';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function rejectBankAccount($user_id){
        $data['is_bank_account_verified'] = 'Rejected';
        $this->db->where('user_id', $user_id);
        if ($this->db->update('user_details', $data)) {
            return 1;
        }
    }
    public function approveUser($user_id){
        $data['admin_verified'] = 1;
        $this->db->where('id', $user_id);
        if ($this->db->update('users', $data)) {
            return 1;
        }
    }

}
