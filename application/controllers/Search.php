<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model');
        // Hapus $this->load->database();
    }

    // Halaman hasil pencarian
    public function index()
    {
        $keyword = $this->input->get('keyword', true);

        $data['keyword'] = $keyword;
        $data['hasil'] = [];

        if (!empty($keyword)) {
            $data['hasil'] = $this->Search_model->cari($keyword);
        }

        $this->load->view('search/hasil', $data);
    }
}
