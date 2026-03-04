<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form', 'whatsapp'));
    }

    public function index()
    {
        if ($this->session->userdata('user')) {
            redirect('dashboard');
        }

        $this->load->view('auth/login');
    }

    public function do_login()
    {
        $phone = $this->input->post('phone');
        $password = $this->input->post('password');
        $user = $this->User_model->get_by_phone($phone);
        if ($user && password_verify($password, $user->password) && $user->status === 'active') {
            $this->session->set_userdata('user', $user);
            redirect('dashboard');
        }
        $data['error'] = 'Login Gagal / Akun Tidak Aktif.';
        $this->load->view('auth/login', $data);
    }

    public function register()
    {
        $this->load->view('auth/register');
    }


    public function do_register()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|exact_length[16]');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/register');
            return;
        }

        $nik = $this->input->post('nik', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $existing_nik = $this->User_model->get_by_nik($nik);
        if ($existing_nik) {
            $data['error'] = 'NIK sudah terdaftar! Silakan login atau gunakan NIK lain.';
            $this->load->view('auth/register', $data);
            return;
        }
        $existing_phone = $this->User_model->get_by_phone($phone);
        if ($existing_phone) {
            $data['error'] = 'Nomor telepon sudah terdaftar! Silakan login atau gunakan nomor lain.';
            $this->load->view('auth/register', $data);
            return;
        }
        $data = array(
            'name' => $this->input->post('name'),
            'nik' => $this->input->post('nik'),
            'phone' => $this->input->post('phone'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role' => 'citizen',
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->User_model->create_user($data);
        $this->load->view('auth/register', ['success' => 'Pendaftaran Akun telah di ajukan.']);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('login');
    }
}
