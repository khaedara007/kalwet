<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data = [];
        $user = $this->session->userdata('user');
        if ($user) $data['user'] = $user;
        $this->load->view('home/landing2', $data);
    }

    public function landing()
    {
        $data = [];
        $user = $this->session->userdata('user');
        if ($user) $data['user'] = $user;
        $this->load->view('home/landing2', $data);
    }
}
