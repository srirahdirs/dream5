<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upi extends CI_Controller {
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
        $this->load->model('Upi_model');
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

        $config["base_url"] = base_url() . "admin/upi";
        $config["total_rows"] = $this->Upi_model->findCount();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['listData'] = $this->Upi_model->get($config["per_page"], $page);


        return $this->load->view('admin/upi/list', $data);
    }

    /*
      |--------------------------------------------------------------------------
      | Add
      |--------------------------------------------------------------------------
     */

    public function add() {

        $model = new Upi_model();
        if ($this->input->post()) {
            $this->form_validation->set_rules('upi_id', 'UPI ID', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/upi/add');
            } else {
                if($model->add()) {
                    $this->session->set_flashdata('success', 'Added Successfully!.');
                    return redirect('admin/upi');
                } else {
                    $this->session->set_flashdata('error', 'Failed to Add.');
                    return redirect('admin/upi/add');
                }
            }
        } else {
            return $this->load->view('admin/upi/add');
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Edit
      |--------------------------------------------------------------------------
     */

    public function edit($id) {
        $model = new Upi_model();
        $upi = $model->find($id);
        
        $data['upi'] = $upi;    
        $this->form_validation->set_rules('upi_id', 'Upi Id', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/upi/edit', $data);
            } else {                
                $model->edit($id);
                
                return redirect('admin/upi');
            }
        } else {
            $this->load->view('admin/upi/edit', $data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Delete
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $this->Upi_model->delete($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/upi');
    }

}
