<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAuth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        if ($this->session->userdata('user') && $this->session->userdata('user')->role === 'admin') {
            redirect('admin');
        }
        $this->load->view('admin/login');
    }

    public function do_login()
    {
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user = $this->User_model->get_by_phone($phone);
        if ($user && $user->role === 'admin' && password_verify($password, $user->password) && $user->status === 'active') {
            $this->session->set_userdata('user', $user);
            redirect('admin');
        }
        $data['error'] = 'Invalid admin credentials or account not active.';
        $this->load->view('admin/login', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
