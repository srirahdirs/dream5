<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Approvals extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Approvals_model');
        $this->load->library(['form_validation','email', 'pagination']);
        $this->load->helper(['form','email']);
        if (!$this->session->userdata('admin_logged_in')) {
            redirect('admin/login');
        }
    }

    public function convertionRate() {

        $data['getRate'] = $this->Approvals_model->getRate();
        if ($this->input->post()) {
           
            $this->form_validation->set_rules('kes', 'Convertion Amount', 'required');            
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/approvals/convertion_rate', $data);
            } else {
                $this->Approvals_model->setRate();
                $this->session->set_flashdata('success', 'Updated Successfully!.');
                $data['getRate'] = $this->Approvals_model->getRate();
            }
        }
        return $this->load->view('admin/approvals/convertion_rate', $data);
    }
    public function briefPayment() {

        $data['listData'] = $this->Approvals_model->getBriefPayment();        
        return $this->load->view('admin/approvals/brief_payment', $data);
    }
    public function ApproveBriefPayment($id) {
        $this->Approvals_model->approveBriefPayment($id);  
        $this->session->set_flashdata('success', 'Approved Successfully!.');
        return redirect('admin/approvals/brief-payment');
        
    }

    /*
      |--------------------------------------------------------------------------
      | Add
      |--------------------------------------------------------------------------
     */

    public function ManageAdmin() {
        $data['listData'] = $this->Approvals_model->getAdmins();
        return $this->load->view('admin/approvals/admin_lists',$data);        
    }
    public function UpiPayments() {
        $data['listData'] = $this->Approvals_model->getUpiPayments();
        return $this->load->view('admin/approvals/upi_payments',$data);        
    }
    public function UserGames() {
        $data['listData'] = $this->Approvals_model->getUserGames();
        return $this->load->view('admin/approvals/user_games',$data);        
    }
    public function ConfirmUpiPayment($order_id) {
        $this->Approvals_model->approveUpiPayment($order_id);  
        $this->session->set_flashdata('success', 'Approved Successfully!.');
        return redirect('admin/upi-payments');        
    }
    public function setMatchResult($game_id) {
        $winning_team = $_GET['winning_team'];
        $this->Approvals_model->setMatchResult($game_id,$winning_team); 
        $this->session->set_flashdata('success', 'Result sets Successfully!.');
        return redirect('admin/user-games'); 
    }
    public function ApproveKyc($user_id) {
        $this->Approvals_model->ApproveKyc($user_id);  
        $this->session->set_flashdata('success', 'Approved Successfully!.');
        return redirect('admin/user-kycs');        
    }
    public function RejectKyc($user_id) {
        $this->Approvals_model->RejectKyc($user_id);  
        $this->session->set_flashdata('success', 'Rejected Successfully!.');
        return redirect('admin/user-kycs');        
    }
    public function UserKycs() {
        $data['listData'] =  $this->Approvals_model->getUsersKyc();  
        return $this->load->view('admin/approvals/user_kycs',$data);       
    }
    public function AddAdmin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            return $this->load->view('admin/approvals/add_admin');
        } else {
            if ($this->Approvals_model->addAdmin()) {
                $this->session->set_flashdata('success', 'Added Successfully!.');
                return redirect('admin/approvals/manage-admin');
            } else {
                $this->session->set_flashdata('error', 'Failed to Add.');
                return $this->load->view('admin/approvals/add_admin');
            }
        }
    }
    public function DeleteAdmin($id) {
        $this->Approvals_model->deleteAdmin($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/approvals/manage-admin');
    }

    public function ManageSkills() {
        $data['listData'] = $this->Approvals_model->getSkills();
        return $this->load->view('admin/approvals/approve_skills',$data);
    }
    public function AcceptSkill($id) {
        $this->Approvals_model->acceptSkill($id);
        $this->session->set_flashdata('success', 'Accepted Successfully');
        return redirect('admin/approvals/manage-skills');
    }
    public function RejectSkill($id) {
        $this->Approvals_model->rejectSkill($id);
        $this->session->set_flashdata('success', 'Rejected Successfully');
        return redirect('admin/approvals/manage-skills');
    }

    public function edit($id) {
        $model = new Sm_channels_model();
        $sm_channel = $model->find($id);
        $original_value = $sm_channel->sm_channel;
        if ($this->input->post('sm_channel') != $original_value) {
            $is_unique = '|is_unique[sm_channels.sm_channel]';
        } else {
            $is_unique = '';
        }
        $data['sm_channel'] = $sm_channel;

        $this->form_validation->set_rules('sm_channel', 'Sm Channel', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('minimum_followers', 'Minimum Followers', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->input->post()) {
            if ($this->form_validation->run() == FALSE) {
                return $this->load->view('admin/sm_channels/edit', $data);
            } else {
                $model->edit($id);
                $this->session->set_flashdata('success', 'Updated Successfully!.');
                return redirect('admin/sm-channels');
            }
        } else {
            $this->load->view('admin/sm_channels/edit', $data);
        }
    }

    /*
      |--------------------------------------------------------------------------
      | Delete
      |--------------------------------------------------------------------------
     */

    public function delete($id) {
        $this->Sm_channels_model->delete($id);
        $this->session->set_flashdata('success', 'Deleted Successfully');
        return redirect('admin/sm-channels');
    }

}
