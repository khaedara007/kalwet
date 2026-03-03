<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Rating_model');
    }

    public function index()
    {
        $data = [];
        $user = $this->session->userdata('user');
        if ($user) $data['user'] = $user;
        // Ambil statistik rating untuk ditampilkan di landing page
        $data['rating_stats'] = $this->Rating_model->getRatingStats();

        // Cek apakah user sudah rating (jika login)
        $data['sudah_rating'] = false;
        if ($user && isset($user->id)) {
            $data['sudah_rating'] = $this->Rating_model->hasUserRated($user->id);
        }
        $this->load->view('home/landing2', $data);
    }

    public function landing()
    {
        $data = [];
        $user = $this->session->userdata('user');
        if ($user) $data['user'] = $user;
        $data['rating_stats'] = $this->Rating_model->getRatingStats();

        $data['sudah_rating'] = false;
        if ($user && isset($user['id'])) {
            $data['sudah_rating'] = $this->Rating_model->hasUserRated($user['id']);
        }
        $this->load->view('home/landing2', $data);
    }
}
