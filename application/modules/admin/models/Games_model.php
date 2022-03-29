<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Games_model extends CI_Model {
    protected $table = 'games';
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
        return $this->db->get_where('games')->result_array();
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
        $this->db->order_by('id ASC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function add() {
        $data = [];
        $data['category'] = $this->input->post('category');     
        $data['game_type'] = $this->input->post('game_type');     
        $data['team_a'] = $this->input->post('team_a');
        $data['team_b'] = $this->input->post('team_b');
        $data['match_date_time'] = $this->input->post('match_date_time');
        $data['status'] = $this->input->post('status');
        return $this->db->insert($this->table,$data);
    }
    public function edit($id)
    {
        $data = [];
        $data['category'] = $this->input->post('category');     
        $data['game_type'] = $this->input->post('game_type');     
        $data['team_a'] = $this->input->post('team_a');
        $data['team_b'] = $this->input->post('team_b');
        $data['match_date_time'] = $this->input->post('match_date_time');
        $data['status'] = $this->input->post('status');
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);   
//        $this->db->last_query();
//        die;
    }
    public function delete($id) {
        $data['status'] = 'Deleted';
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);      
    }
    public function updateGameStatus($id,$status)
    {
        $data = [];
        $data['status'] = $status;
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);       
        
    }
    //for  frontend 
    // public function findGameCount() {
    //      return $this->db->from($this->table)->count_all_results();
    // }
   
    //all games
    public function findAllGames($limit, $start) {
        return $this->db->order_by('
    CASE 
      WHEN DATE(match_date_time) = DATE(NOW()) THEN 0
      WHEN DATE(match_date_time) > DATE(NOW()) THEN 1
      ELSE 2
    END , DATE(match_date_time) ASC')->limit($limit, $start)->get_where($this->table)->result_array(0);
    }

}
