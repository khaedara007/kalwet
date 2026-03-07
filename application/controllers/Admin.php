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

    private function send_approval_wa($user)
    {
        // Load helper
        $this->load->helper('fonnte');

        // Format nomor (08xx -> 628xx)
        $target = format_phone_wa($user->phone);

        // Buat pesan
        $message = "✅ *AKUN SIMPEL AWET DISETUJUI*\n\n";
        $message .= "Halo *{$user->name}*,\n\n";
        $message .= "Selamat! Pendaftaran akun Anda telah *DISETUJUI* oleh admin.\n\n";
        $message .= "*Detail Akun:*\n";
        $message .= "• Nama: {$user->name}\n";
        $message .= "• NIK: {$user->nik}\n";
        $message .= "• NIK: {$user->phone}\n";
        $message .= "• Status: AKTIF\n\n";
        $message .= "Silakan login ke aplikasi dengan Nomor HP dan password yang telah didaftarkan.\n\n";
        $message .= "Terima kasih telah mendaftar! 🎉";

        // Kirim ke Fonnte
        $response = send_wa_fonnte($target, $message);

        // Log untuk debug
        log_message('info', 'WA Approval: ' . $target . ' | Response: ' . json_encode($response));

        return $response;
    }

    public function verify_account($id = null)
    {
        if ($id === null) {
            show_404();
        }

        $action = $this->input->get('action');

        if ($action === 'approve') {
            // Proses approve akun
            $this->load->model('User_model');

            // Ambil data user dulu sebelum update
            $user = $this->User_model->get_by_id($id);

            if (!$user) {
                $this->session->set_flashdata('error', 'User tidak ditemukan!');
                redirect('admin/dashboard');
            }

            // Update status user
            $this->User_model->update_status($id, 'active');

            // Kirim notifikasi WA (jika ada)
            $this->send_approval_wa($user);

            $this->session->set_flashdata('success', 'Akun berhasil disetujui! Notifikasi WhatsApp terkirim.');
        } elseif ($action === 'reject') {
            // Jika ada fitur reject
            $this->User_model->update_status($id, 'rejected');
            $this->session->set_flashdata('success', 'Akun ditolak!');
        } else {
            $this->session->set_flashdata('error', 'Aksi tidak valid!');
        }

        redirect('admin/dashboard'); // atau halaman sebelumnya
    }

    public function approve_request($id = null)
    {
        $this->check_admin();

        if ($id === null) {
            show_404();
        }

        $request = $this->Service_model->get_by_id($id);

        if (!$request) {
            $this->session->set_flashdata('error', 'Data permohonan tidak ditemukan!');
            redirect('admin/dashboard');
        }

        // Cek status harus under_review
        if ($request->status !== 'under_review') {
            $this->session->set_flashdata('error', 'Status permohonan tidak valid untuk disetujui!');
            redirect('admin/dashboard');
        }

        // Update status menjadi in_process
        $this->Service_model->update_status($id, 'in_process');

        // Kirim notifikasi WA ke user (opsional)
        // send_whatsapp($request->phone, 'Permohonan Anda telah disetujui dan sedang diproses.');

        $this->session->set_flashdata('success', 'Permohonan disetujui! Status sekarang: Dalam Proses.');
        redirect('admin/requests');
    }

    public function reject_request($id = null)
    {
        $this->check_admin();

        if ($id === null) {
            show_404();
        }

        // Ambil data request/service berdasarkan ID
        $request = $this->Service_model->get_by_id($id);

        if (!$request) {
            $this->session->set_flashdata('error', 'Data permohonan tidak ditemukan!');
            redirect('admin/dashboard');
        }

        $revision_notes = $this->input->post('revision_notes'); // Ambil alasan dari form admin

        $this->Service_model->update_status($id, 'needs_revision', $revision_notes);

        // Optional: Kirim notifikasi WA ke user bahwa permohonan ditolak
        // $user = $this->User_model->get_by_id($request->user_id);
        // send_whatsapp($user->phone, 'Maaf, permohonan Anda ditolak.');

        $this->session->set_flashdata('success', 'Permohonan berhasil ditolak!');

        redirect('admin/requests');
    }

    public function upload_completed($id = null)
    {
        $this->check_admin();

        if ($id === null) {
            show_404();
        }

        // Ambil data permohonan
        $request = $this->Service_model->get_by_id($id);

        if (!$request) {
            $this->session->set_flashdata('error', 'Data permohonan tidak ditemukan!');
            redirect('admin/dashboard');
        }

        // Cek status harus in_process
        if ($request->status !== 'in_process') {
            $this->session->set_flashdata('error', 'Status permohonan tidak valid untuk upload! Status saat ini: ' . $request->status);
            redirect('admin/dashboard');
        }

        // Konfigurasi upload
        $config['upload_path'] = './assets/uploads/completed/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 5120; // 5MB
        $config['file_name'] = 'completed_' . $id . '_' . time();
        $config['overwrite'] = FALSE;

        // Buat folder jika belum ada
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->load->library('upload', $config);

        // Proses upload
        if (!$this->upload->do_upload('completed_document')) {
            // Upload gagal
            $error = $this->upload->display_errors('', '');
            $this->session->set_flashdata('error', 'Gagal upload file: ' . $error);
            redirect('admin/dashboard');
        } else {
            // Upload berhasil
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            // Update database: simpan file dan ubah status jadi completed
            $this->Service_model->update_completed($id, $file_name);

            // Update status menjadi completed
            $this->Service_model->update_status($id, 'completed');

            // Kirim notifikasi WA ke user (opsional)
            // if (function_exists('send_whatsapp')) {
            //     $message = "Halo {$request->name},\n\nPermohonan layanan Anda telah selesai diproses.\nSilakan login ke aplikasi untuk mengunduh dokumen hasil.\n\nTerima kasih.";
            //     send_whatsapp($request->phone, $message);
            // }

            $this->session->set_flashdata('success', 'Dokumen berhasil diupload! Permohonan #' . $id . ' telah selesai.');
            redirect('admin/requests');
        }
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
