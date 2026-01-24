<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Service_model','Service_type_model'));
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
    }

    protected function check_login()
    {
        $user = $this->session->userdata('user');
        if (!$user) redirect('login');
        return $user;
    }

    public function submit()
    {
        $user = $this->check_login();

        if ($this->input->method() === 'post') {
            $this->form_validation->set_rules('name','Full Name','required');
            $this->form_validation->set_rules('nik','NIK','required|exact_length[16]');
            $this->form_validation->set_rules('kk_number','KK Number','required');
            $this->form_validation->set_rules('phone','Phone','required');
            $this->form_validation->set_rules('date_of_birth','Date of Birth','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('service_type','Service Type','required');

            if ($this->form_validation->run() === FALSE) {
                $data['types'] = $this->Service_type_model->get_active();
                $this->load->view('user/service_form', $data);
                return;
            }

            // handle upload
            $config['upload_path'] = './assets/uploads/documents/';
            $config['allowed_types'] = 'pdf|jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            $uploaded = null;
            if ($this->upload->do_upload('document')) {
                $uploaded = $this->upload->data('file_name');
            }

            $uploaded2 = null;
            if ($this->upload->do_upload('document2')) {
                $uploaded2 = $this->upload->data('file_name');
            }

            $payload = [
                'user_id' => $user->id,
                'name' => $this->input->post('name'),
                'nik' => $this->input->post('nik'),
                'kk_number' => $this->input->post('kk_number'),
                'phone' => $this->input->post('phone'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'address' => $this->input->post('address'),
                'service_type' => $this->input->post('service_type'),
                'additional_notes' => $this->input->post('additional_notes'),
                'upload_suratrtrw' => $uploaded,
                'upload_kk' => $uploaded2,
                'status' => 'under_review',
                'submitted_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Service_model->create_request($payload);
            $this->load->view('user/service_form', ['success' => 'Request submitted.']);
            return;
        }

        $data['types'] = $this->Service_type_model->get_active();
        $this->load->view('user/service_form', $data);
    }
}
