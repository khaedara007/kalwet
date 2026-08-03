<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('User_model', 'Service_model', 'Rating_model', 'Sk_lkk_model'));
        $this->load->library('form_validation');
        $this->load->library('session', 'upload');
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
        $message .= "*Detail Akun :*\n";
        $message .= "• Nama : {$user->name}\n";
        $message .= "• NIK : {$user->nik}\n";
        $message .= "• Nomor Telepon : {$user->phone}\n";
        $message .= "• Status : AKTIF\n\n";
        $message .= "Silakan login ke website dengan Nomor HP dan password yang telah didaftarkan.\n\n";
        $message .= "Terima kasih telah mendaftar! 🎉";

        // Kirim ke Fonnte
        $response = send_wa_fonnte($target, $message);

        // Log untuk debug
        log_message('info', 'WA Approval: ' . $target . ' | Response: ' . json_encode($response));

        return $response;
    }

    private function send_rejection_wa($user)
    {
        // Load helper
        $this->load->helper('fonnte');

        // Format nomor (08xx -> 628xx)
        $target = format_phone_wa($user->phone);

        // Buat pesan
        $message = "❌ *AKUN SIMPEL AWET DITOLAK*\n\n";
        $message .= "Halo *{$user->name}*,\n\n";
        $message .= "Mohon maaf, pendaftaran akun Anda *TIDAK DAPAT DISETUJUI* oleh admin.\n\n";
        $message .= "*Detail Akun :*\n";
        $message .= "• Nama : {$user->name}\n";
        $message .= "• NIK : {$user->nik}\n";
        $message .= "• Nomor Telepon : {$user->phone}\n";
        $message .= "• Status : DITOLAK\n\n";
        $message .= "Penolakan ini disebabkan oleh:\n";
        $message .= "• Tidak memenuhi persyaratan pendaftaran\n";
        $message .= "• Data NIK tidak terdaftar sebagai kependudukan di Kalinyamat Wetan\n\n";
        $message .= "Silakan hubungi admin untuk informasi lebih lanjut.\n\n";
        $message .= "Terima kasih atas pengertiannya. 🙏";

        // Kirim ke Fonnte
        $response = send_wa_fonnte($target, $message);

        // Log untuk debug
        log_message('info', 'WA Rejection: ' . $target . ' | Response: ' . json_encode($response));

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

            // Kirim notifikasi WA Sukses
            $this->send_approval_wa($user);

            $this->session->set_flashdata('success', 'Akun berhasil disetujui! Notifikasi WhatsApp terkirim.');
        } elseif ($action === 'reject') {
            // Proses reject akun
            $this->load->model('User_model');

            // Ambil data user dulu sebelum update
            $user = $this->User_model->get_by_id($id);

            if (!$user) {
                $this->session->set_flashdata('error', 'User tidak ditemukan!');
                redirect('admin/dashboard');
            }

            // Update status user
            $this->User_model->update_status($id, 'rejected');

            // Kirim notifikasi WA Penolakan
            $this->send_rejection_wa($user);
            $this->User_model->update_status($id, 'rejected');
            $this->session->set_flashdata('success', 'Akun ditolak! Notifikasi WhatsApp terkirim');
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
            // Load helper Fonnte
            $this->load->helper('fonnte');

            // Ambil data user
            $user = $this->User_model->get_by_id($request->user_id);

            if ($user && !empty($user->phone)) {

                $phone = format_phone_wa($user->phone);

                $message = "✅ *PERMOHONAN SELESAI - SIMPEL AWET*\n\n"
                    . "Halo *" . $user->name . "*,\n\n"
                    . "Permohonan Anda telah *SELESAI* diproses! 🎉\n\n"
                    . "📋 *Detail:*\n"
                    . "• Layanan: " . $request->service_name . "\n"
                    . "• Tanggal: " . date('d M Y H:i') . "\n\n"
                    . "📄 Dokumen siap diunduh di dashboard Anda.\n\n"
                    . "🔗 simpelawet.my.id \n\n"
                    . "Terima kasih! 🙏 ";

                // Kirim WA
                $wa_response = send_wa_fonnte($phone, $message);

                // Log hasil (opsional)
                if (isset($wa_response['status']) && $wa_response['status'] === true) {
                    log_message('info', 'WA terkirim ke ' . $phone . ' untuk permohonan #' . $id);
                } else {
                    log_message('error', 'WA gagal: ' . json_encode($wa_response));
                }
            }

            // ============================================================

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

    public function history()
    {
        // Ambil hanya permohonan dengan status 'completed'
        $this->db->where('status', 'completed');
        $this->db->order_by('completed_at', 'DESC');
        $data['history'] = $this->db->get('service_requests')->result();

        $this->load->view('admin/history', $data);
    }

    /**
     * Halaman Manajemen SK LKK
     */
    public function sk_lkk()
    {
        $data['title'] = 'Manajemen SK LKK';
        $data['sk_list'] = $this->Sk_lkk_model->get_all();
        $data['total_sk'] = $this->Sk_lkk_model->count_all();
        $data['sk_aktif'] = $this->Sk_lkk_model->count_by_status('aktif');
        $data['total_perubahan'] = $this->Sk_lkk_model->count_history();
        $data['sk_terbaru'] = $this->Sk_lkk_model->get_latest_date();
        $data['filter'] = 'all';

        $this->load->view('admin/lkk', $data);
    }

    /**
     * Filter SK LKK berdasarkan jenis
     */
    public function sk_lkk_filter($jenis = 'all')
    {
        $data['title'] = 'Manajemen SK LKK';

        if ($jenis == 'all') {
            $data['sk_list'] = $this->Sk_lkk_model->get_all();
        } else {
            $data['sk_list'] = $this->Sk_lkk_model->get_by_jenis($jenis);
        }

        $data['total_sk'] = $this->Sk_lkk_model->count_all();
        $data['sk_aktif'] = $this->Sk_lkk_model->count_by_status('aktif');
        $data['total_perubahan'] = $this->Sk_lkk_model->count_history();
        $data['sk_terbaru'] = $this->Sk_lkk_model->get_latest_date();
        $data['filter'] = $jenis;

        $this->load->view('admin/lkk', $data);
    }

    /**
     * Upload SK LKK baru
     */
    public function upload_sk_lkk()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            show_error('Invalid request method', 405);
        }

        $this->load->library('form_validation');
        $this->load->library('upload');

        // AMBIL USER ID DARI SESSION
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
            $user_id = $this->session->userdata('id');
        }
        if (empty($user_id)) {
            $user_id = $this->session->userdata('admin_id');
        }
        if (empty($user_id)) {
            $user_id = 1; // fallback default
        }

        // Validasi input
        $this->form_validation->set_rules('jenis_lkk', 'Jenis LKK', 'required');
        $this->form_validation->set_rules('nomor_sk', 'Nomor SK', 'required|max_length[100]');
        $this->form_validation->set_rules('periode_mulai', 'Periode Mulai', 'required|numeric');
        $this->form_validation->set_rules('periode_selesai', 'Periode Selesai', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/sk_lkk');
        }

        $jenis_lkk = $this->input->post('jenis_lkk');
        $nomor_sk = $this->input->post('nomor_sk');

        $existing = $this->Sk_lkk_model->get_by_jenis_nomor($jenis_lkk, $nomor_sk);

        $upload_path = './uploads/sk_lkk/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10240;
        $config['file_name'] = 'SK_' . strtoupper(str_replace('-', '_', $jenis_lkk)) . '_' . date('Y') . '_' . time();

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_sk')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/sk_lkk');
        }

        $upload_data = $this->upload->data();
        $file_size = $this->_format_size($upload_data['file_size']);

        if ($existing) {
            $this->Sk_lkk_model->archive_to_history($existing->id);

            $data = array(
                'nomor_sk' => $nomor_sk,
                'periode_mulai' => $this->input->post('periode_mulai'),
                'periode_selesai' => $this->input->post('periode_selesai'),
                'keterangan' => $this->input->post('keterangan'),
                'file_name' => $upload_data['file_name'],
                'file_path' => 'uploads/sk_lkk/' . $upload_data['file_name'],
                'file_size' => $file_size,
                'file_type' => $upload_data['file_type'],
                'versi' => $existing->versi + 1,
                'status' => 'aktif',
                'uploaded_by' => $user_id,  // <-- PAKAI VARIABEL $user_id
                'updated_at' => date('Y-m-d H:i:s')
            );

            $this->Sk_lkk_model->update($existing->id, $data);
            $this->session->set_flashdata('success', 'SK berhasil diperbarui! Versi baru: v' . ($existing->versi + 1));
        } else {
            $data = array(
                'jenis_lkk' => $jenis_lkk,
                'nomor_sk' => $nomor_sk,
                'periode_mulai' => $this->input->post('periode_mulai'),
                'periode_selesai' => $this->input->post('periode_selesai'),
                'keterangan' => $this->input->post('keterangan'),
                'file_name' => $upload_data['file_name'],
                'file_path' => 'uploads/sk_lkk/' . $upload_data['file_name'],
                'file_size' => $file_size,
                'file_type' => $upload_data['file_type'],
                'versi' => 1,
                'status' => 'aktif',
                'uploaded_by' => $user_id  // <-- PAKAI VARIABEL $user_id
            );

            $this->Sk_lkk_model->insert($data);
            $this->session->set_flashdata('success', 'SK baru berhasil diupload!');
        }

        redirect('admin/sk_lkk');
    }

    /**
     * Download file SK
     */
    public function download_sk($id)
    {
        $sk = $this->Sk_lkk_model->get_by_id($id);

        if (!$sk) {
            show_404();
        }

        $file_path = FCPATH . $sk->file_path;

        if (!file_exists($file_path)) {
            $this->session->set_flashdata('error', 'File tidak ditemukan!');
            redirect('admin/sk_lkk');
        }

        force_download($file_path, NULL);
    }

    /**
     * Hapus SK beserta history-nya
     */
    public function delete_sk($id)
    {
        $sk = $this->Sk_lkk_model->get_by_id($id);

        if ($sk) {
            // Hapus file fisik
            $file_path = FCPATH . $sk->file_path;
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Hapus history files
            $history = $this->Sk_lkk_model->get_history($id);
            foreach ($history as $h) {
                $h_path = FCPATH . $h->file_path;
                if (file_exists($h_path)) {
                    unlink($h_path);
                }
            }

            $this->Sk_lkk_model->delete($id);
            $this->session->set_flashdata('success', 'SK berhasil dihapus!');
        }

        redirect('admin/sk_lkk');
    }

    /**
     * Helper: Format ukuran file
     */
    private function _format_size($size)
    {
        $units = array('Bytes', 'KB', 'MB', 'GB');
        $unit = floor(log($size, 1024));
        return round($size / pow(1024, $unit), 2) . ' ' . $units[$unit];
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

    public function lkk()
    {
        $this->check_admin();
        $data['users'] = $this->User_model->get_all();
        $this->load->view('admin/lkk', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('adminAuth');
    }
}
