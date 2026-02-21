<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Service_model'));
        $this->load->library('session');
        $this->load->helper(array('url', 'whatsapp'));
    }

    protected function check_admin()
    {
        $user = $this->session->userdata('user');
        if (!$user || $user->role !== 'admin') redirect('adminAuth');
        return $user;
    }

    public function dashboard()
    {
        $this->check_admin();
        $data['all_requests'] = $this->Service_model->get_all();
        $data['pending_accounts'] = $this->User_model->get_pending();
        $this->load->view('admin/dashboard', $data);
    }

    public function verify_account($id)
    {
        $this->check_admin();
        $action = $this->input->get('action'); // approve or reject
        if ($action === 'approve') {
            $this->User_model->update_status($id, 'active');
            $user = $this->User_model->get_by_id($id);
            send_whatsapp($user->phone, 'Your account has been verified and activated. You can now login.');
        } else {
            $this->User_model->update_status($id, 'rejected');
            $user = $this->User_model->get_by_id($id);
            send_whatsapp($user->phone, 'Your account registration has been rejected.');
        }
        redirect('admin');
    }

    public function requests()
    {
        $this->check_admin();
        $data['requests'] = $this->Service_model->get_all();
        $this->load->view('admin/service_requests', $data);
    }

    public function users()
    {
        $this->check_admin();
        $data['users'] = $this->User_model->get_all();
        $this->load->view('admin/users', $data);
    }

    public function approve_request($id)
    {
        $this->check_admin();
        $this->Service_model->update_status($id, 'in_process');
        redirect('admin/requests');
    }

    public function reject_request($id)
    {
        $this->check_admin();
        $reason = $this->input->post('reason') ?: 'Rejected by admin';
        $this->Service_model->update_status($id, 'needs_revision', $reason);
        redirect('admin/requests');
    }

    public function upload_completed($id)
    {
        $this->check_admin();
        if ($this->input->method() === 'post') {
            $config['upload_path'] = './assets/uploads/completed/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('completed_document')) {
                $file = $this->upload->data('file_name');
                $this->Service_model->update_completed($id, $file);
                $this->Service_model->update_status($id, 'completed');
            }
        }
        redirect('admin/requests');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('adminAuth');
    }
}
