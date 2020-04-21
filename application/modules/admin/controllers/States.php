<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class States extends CI_Controller {
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
        $this->load->model('States_model');
        $this->load->library(['form_validation', 'email', 'pagination']);
        $this->load->helper(['form', 'email']);
    }

    /**
     * Display a Index.
     *
     * @return mixed
     */
    public function index() {

        $config["base_url"] = base_url() . "admin/states";
        $config["total_rows"] = $this->States_model->findCount();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['listData'] = $this->States_model->get($config["per_page"], $page);


        return $this->load->view('admin/states/list', $data);
    }

    /*
      |--------------------------------------------------------------------------
      | Add
      |--------------------------------------------------------------------------
     */

    public function add() {

        $model = new States_model();

        if ($this->input->post()) {
            $this->form_validation->set_rules('country', 'Country', 'required|is_unique[states.country]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/states/add');
            } else {
                if ($model->add()) {
                    $this->session->set_flashdata('success', 'Added Successfully!.');
                    return redirect('admin/states');
                } else {
                    $this->session->set_flashdata('error', 'Failed to Add.');
                    return redirect('admin/states/add');
                }
            }
        } else {
            return $this->load->view('admin/states/add');
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Edit
      |--------------------------------------------------------------------------
     */

    public function edit($id) {
        $model = new States_model();
        $country = $model->find($id);
        $original_value = $country->country;
        if ($this->input->post('country') != $original_value) {
            $is_unique = '|is_unique[states.country]';
        } else {
            $is_unique = '';
        }
        $data['country'] = $country;
        
        $this->form_validation->set_rules('country', 'Country', 'required' . $is_unique);
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/states/edit', $data);
            } else {                
                $model->edit($id);
                $this->session->set_flashdata('success', 'Updated Successfully!.');
                return redirect('admin/states');
            }
        } else {
            $this->load->view('admin/states/edit', $data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Delete
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $this->States_model->delete($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/states');
    }

}
