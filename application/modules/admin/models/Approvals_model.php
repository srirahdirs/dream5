<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Approvals_model extends CI_Model {
    protected $convertion_table = 'dollar_to_kes';
    protected $admin_table = 'admin';
    protected $skill_table = 'skills';
    protected $brief_payment_table = 'brief';
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
    public function getBriefPayment() {
        return $this->db->select('brief.*,business.business,user.first_name as user')->join('business','business.id = brief.business')->join('user','user.id = brief.user')->get_where($this->brief_payment_table)->result_array();
    }
    public function approveBriefPayment($id) {
        $data['payment_status'] = 'approved';
        $this->db->where(['id' => $id]);
        $this->db->update('brief',$data);
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
