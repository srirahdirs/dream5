<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {
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
        $this->load->model('Cities_model');
        $this->load->library(['form_validation', 'email', 'pagination']);
        $this->load->helper(['form', 'email']);
        if ( ! $this->session->userdata('admin_logged_in'))
        { 
            redirect('admin/login');            
        }
    }

    /**
     * Display a Index.
     *
     * @return mixed
     */
    public function index() {

        $config["base_url"] = base_url() . "admin/cities";
        $config["total_rows"] = $this->Cities_model->findCount();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['listData'] = $this->Cities_model->get($config["per_page"], $page);


        return $this->load->view('admin/cities/list', $data);
    }

    /*
      |--------------------------------------------------------------------------
      | Add
      |--------------------------------------------------------------------------
     */

    public function add() {

        $model = new Cities_model();
        $data['country'] = $model->countryList();
        if ($this->input->post()) {
            $this->form_validation->set_rules('city', 'City', 'required|is_unique[cities.city]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('country_id', 'Country', 'required');
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/cities/add',$data);
            } else {
                if($model->add()) {
                    $this->session->set_flashdata('success', 'Added Successfully!.');
                    return redirect('admin/cities');
                } else {
                    $this->session->set_flashdata('error', 'Failed to Add.');
                    return redirect('admin/cities/add',$data);
                }
            }
        } else {
            return $this->load->view('admin/cities/add',$data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Edit
      |--------------------------------------------------------------------------
     */

    public function edit($id) {
        $model = new Cities_model();
        $city = $model->find($id);
        $original_value = $city->city;
        if ($this->input->post('city') != $original_value) {
            $is_unique = '|is_unique[cities.city]';
        } else {
            $is_unique = '';
        }
        $data['city'] = $city;
        $data['country'] = $model->countryList();
        $this->form_validation->set_rules('city', 'City', 'required' . $is_unique);
        $this->form_validation->set_rules('country_id', 'Country', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/cities/edit', $data);
            } else {                
                $model->edit($id);
                $this->session->set_flashdata('success', 'Updated Successfully!.');
                return redirect('admin/cities');
            }
        } else {
            $this->load->view('admin/cities/edit', $data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Delete
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $this->Cities_model->delete($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/cities');
    }

}
