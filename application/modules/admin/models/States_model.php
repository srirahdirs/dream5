<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class States_model extends CI_Model {
    protected $table = 'all_states';
    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function findAll() {
        return $this->db->get_where($this->table)->result_array();
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
        $data['state_name'] = $this->input->post('state_name');  
        return $this->db->insert($this->table,$data);
    }
    public function edit($state_code)
    {
        $data = [];
        $data['state_name'] = $this->input->post('state_name');     
        $this->db->where('state_code', $state_code);
        $this->db->update($this->table, $data);       
        
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}
