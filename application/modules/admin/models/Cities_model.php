<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cities_model extends CI_Model {
    protected $table = 'all_cities';
    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    public function findAll() {
        return $this->db->get_where($this->table)->result_array();
    }
    public function countryList() {
        return $this->db->get_where('all_cities')->result_array();
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
        $this->db->select('all_cities.*,countries.country');
        $this->db->join('countries','countries.id = cities.country_id');
        $this->db->order_by('id asc');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function add() {
        $data = [];
        $data['city'] = $this->input->post('city');     
        $data['country_id'] = $this->input->post('country_id');     
        $data['status'] = $this->input->post('status');
        $data['created_on'] = date('Y-m-d h:i:s');
        $data['updated_on'] = date('Y-m-d h:i:s');
        $data['created_by'] = $this->session->userdata('admin_id');
        $data['updated_by'] = $this->session->userdata('admin_id');
        return $this->db->insert($this->table,$data);
    }
    public function edit($id)
    {
        $data = [];
        $data['city'] = $this->input->post('city'); 
        $data['country_id'] = $this->input->post('country_id');   
        $data['status'] = $this->input->post('status');
        $data['updated_on'] = date('Y-m-d h:i:s');
        $data['updated_by'] = $this->session->userdata('admin_id');
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);       
        
    }
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}
