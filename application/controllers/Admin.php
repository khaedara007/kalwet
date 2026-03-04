<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Service_model', 'Rating_model'));
        $this->load->library('session');
        $this->load->helper(array('url', 'whatsapp'));

        // Load database untuk method reset_all_ratings
        $this->load->database();
    }

    protected function check_admin()
    {
        $user = $this->session->userdata('user');
        if (!$user || $user->role !== 'admin') redirect('adminauth');
        return $user;
    }

    public function dashboard()
    {
        $this->check_admin();
        $data['all_requests'] = $this->Service_model->get_all();
        $data['pending_accounts'] = $this->User_model->get_pending();
        $this->load->view('admin/dashboard', $data);
    }

    public function delete_user($id)
    {
        $this->check_admin();

        // Cek apakah user ada
        $user = $this->User_model->get_by_id($id);

        if (!$user) {
            $this->session->set_flashdata('error', 'User tidak ditemukan!');
            redirect('admin/users');
        }

        // Cegah admin menghapus dirinya sendiri
        $current_user = $this->session->userdata('user');
        if ($user->id == $current_user->id) {
            $this->session->set_flashdata('error', 'Anda tidak dapat menghapus akun sendiri!');
            redirect('admin/users');
        }

        // Hapus user
        if ($this->User_model->delete($id)) {
            $this->session->set_flashdata('success', "Akun {$user->name} berhasil dihapus!");
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus akun!');
        }

        redirect('admin/users');
    }

    /**
     * Halaman kelola rating
     */
    public function ratings()
    {
        $this->check_admin();

        // Ambil semua rating dengan info user
        $data['ratings'] = $this->Rating_model->getAllRatings(100);

        // Ambil statistik
        $data['stats'] = $this->Rating_model->getRatingStats();

        $this->load->view('admin/ratings', $data);
    }

    /**
     * Reset semua rating (truncate table)
     */
    public function reset_all_ratings()
    {
        $this->check_admin();

        // Truncate tabel ratings
        $this->db->truncate('ratings');

        $this->session->set_flashdata('success', 'Semua rating berhasil direset!');
        redirect('admin/ratings');
    }

    /**
     * Hapus rating tertentu
     */
    public function delete_rating($id)
    {
        $this->check_admin();

        $this->db->where('id', $id);
        $this->db->delete('ratings');

        $this->session->set_flashdata('success', 'Rating berhasil dihapus!');
        redirect('admin/ratings');
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

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('adminAuth');
    }
}
