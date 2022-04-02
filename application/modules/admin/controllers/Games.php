<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
    /*
      |--------------------------------------------------------------------------
      | User Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles User's.
      |
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('Games_model');
        $this->load->library(['form_validation', 'email', 'pagination']);
        $this->load->helper(['form', 'email']);
        if ( ! $this->session->userdata('admin_logged_in'))
        { 
            redirect('admin/login');            
        }
        date_default_timezone_set("Asia/Calcutta"); 
        $gamesList = $this->Games_model->findAll();
        $today = date("Y-m-d H:i:s");     // 2019-10-30 22:42:18(MySQL DATETIME format)

        foreach ($gamesList as $key => $value) {           
          if($value['match_date_time'] > $today){
          } else {
            $this->Games_model->updateGameStatus($value['id'],'Completed');
          }
        }
        

    }

    /**
     * Display a Index.
     *
     * @return mixed
     */
    public function index() {

        $config["base_url"] = base_url() . "admin/games";
        $config["total_rows"] = $this->Games_model->findCount();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['listData'] = $this->Games_model->get($config["per_page"], $page);


        return $this->load->view('admin/games/list', $data);
    }

    /*
      |--------------------------------------------------------------------------
      | Add
      |--------------------------------------------------------------------------
     */

    public function add() {

        $model = new Games_model();
        $data['country'] = $model->countryList();
        if ($this->input->post()) {
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('game_type', 'Game Type', 'required');
            $this->form_validation->set_rules('team_a', 'Team A', 'required');
            $this->form_validation->set_rules('team_b', 'Team B', 'required');
            $this->form_validation->set_rules('match_date_time', 'Match Date & Time', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/games/add',$data);
            } else {
                if($model->add()) {
                    $this->session->set_flashdata('success', 'Added Successfully!.');
                    return redirect('admin/games');
                } else {
                    $this->session->set_flashdata('error', 'Failed to Add.');
                    return redirect('admin/games/add',$data);
                }
            }
        } else {
            return $this->load->view('admin/games/add',$data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Edit
      |--------------------------------------------------------------------------
     */

    public function edit($id) {
        $model = new Games_model();
        $games = $model->find($id);
        
        $data['games'] = $games;
          $this->form_validation->set_rules('category', 'Category', 'required');
          $this->form_validation->set_rules('status', 'Status', 'required');
          $this->form_validation->set_rules('game_type', 'Game Type', 'required');
          $this->form_validation->set_rules('team_a', 'Team A', 'required');
          $this->form_validation->set_rules('team_b', 'Team B', 'required');
          $this->form_validation->set_rules('match_date_time', 'Match Date & Time', 'required');
          $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/games/edit', $data);
            } else {                
                $model->edit($id);
                
                return redirect('admin/games');
            }
        } else {
            $this->load->view('admin/games/edit', $data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Delete
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $this->Games_model->delete($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/games');
    }

}
