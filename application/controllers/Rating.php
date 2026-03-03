<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rating_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper('url');
    }

    public function submit()
    {
        // Cek login
        $user = $this->session->userdata('user');
        if (!$user) {
            $this->session->set_flashdata('error', 'Silakan login terlebih dahulu');
            redirect('/');
        }

        $user_id = $user->id; // Object access

        // Cek apakah sudah pernah rating
        if ($this->Rating_model->hasUserRated($user_id)) {
            $this->session->set_flashdata('error', 'Anda sudah memberikan rating sebelumnya');
            redirect('/#rating');
        }

        // Validasi input
        $this->form_validation->set_rules('rating', 'Rating', 'required|integer|greater_than[0]|less_than[6]');
        $this->form_validation->set_rules('komentar', 'Komentar', 'max_length[500]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('/#rating');
        }

        // Simpan rating
        $data = [
            'user_id' => $user_id,
            'rating' => $this->input->post('rating'),
            'komentar' => $this->input->post('komentar'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Rating_model->insertRating($data)) {
            $this->session->set_flashdata('success', 'Terima kasih! Rating Anda berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan rating. Silakan coba lagi.');
        }

        redirect('/#rating'); // Kembali ke bagian rating dengan anchor
    }
    public function reset_all()
    {
        // Cek apakah admin (sesuaikan dengan sistem login Anda)
        $user = $this->session->userdata('user');
        if (!$user || $user->role != 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak!');
            redirect('/');
        }

        // Hapus semua rating
        $this->db->truncate('ratings');

        $this->session->set_flashdata('success', 'Semua rating berhasil direset!');
        redirect('/#rating');
    }
}
