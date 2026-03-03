<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Service_model', 'Service_type_model', 'Rating_model'));
        $this->load->library('session');
        $this->load->helper(array('url', 'form'));
    }

    protected function check_login()
    {
        $user = $this->session->userdata('user');
        if (!$user) redirect('login');
        return $user;
    }

    public function landing()
    {
        $user = $this->check_login();
        $data['requests'] = $this->Service_model->get_by_user($user->id);
        // Cek apakah user sudah rating (gunakan $user->id karena object)
        $data['sudah_rating'] = $this->Rating_model->hasUserRated($user->id);
        $this->load->view('user/landing', $data);
    }

    public function profile()
    {
        $user = $this->check_login();
        $data['user'] = $this->User_model->get_by_id($user->id);
        $this->load->view('user/profile', $data);
    }
}
