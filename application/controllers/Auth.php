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
        $password = $this->input->post('password');
        if (strlen($password) < 6) {
            $data['error'] = 'Password minimal 6 karakter.';
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

    public function forgot_password()
    {
        $this->load->view('auth/forgot_password');
    }

    public function reset_password()
    {
        $phone = $this->input->post('phone');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Validasi input tidak boleh kosong
        if (empty($phone) || empty($new_password) || empty($confirm_password)) {
            $data['error'] = 'Semua field wajib diisi.';
            $this->load->view('auth/forgot_password', $data);
            return;
        }

        // Cek apakah nomor telepon terdaftar
        $user = $this->User_model->get_by_phone($phone);

        if (!$user) {
            $data['error'] = 'Nomor telepon tidak terdaftar.';
            $this->load->view('auth/forgot_password', $data);
            return;
        }

        // Validasi password match
        if ($new_password !== $confirm_password) {
            $data['error'] = 'Password baru dan konfirmasi password tidak cocok.';
            $this->load->view('auth/forgot_password', $data);
            return;
        }

        // Validasi minimal panjang password
        if (strlen($new_password) < 6) {
            $data['error'] = 'Password minimal 6 karakter.';
            $this->load->view('auth/forgot_password', $data);
            return;
        }

        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        $update_data = array(
            'password' => $hashed_password,
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->load->model('User_model');
        $update = $this->User_model->update($user->id, $update_data);

        if ($update) {
            $data['success'] = 'Password berhasil diubah. Silakan login dengan password baru.';
        } else {
            $data['error'] = 'Gagal mengubah password. Silakan coba lagi.';
        }

        $this->load->view('auth/forgot_password', $data);
    }


    public function riwayat_lurah()
    {
        $this->load->view('auth/riwayat_lurah');
    }

    public function pdf_proxy($filename = null)
    {
        if (!$filename) {
            show_404();
            return;
        }

        // Decode URL encoded filename
        $filename = urldecode($filename);

        // Security: prevent directory traversal
        $filename = str_replace(['../', '..\\', './', '.\\'], '', $filename);

        $file_path = FCPATH . 'assets/uploads/sop/' . $filename;

        if (!file_exists($file_path) || !is_file($file_path)) {
            show_404();
            return;
        }

        $file_size = filesize($file_path);
        if ($file_size === 0) {
            show_error('File PDF kosong');
            return;
        }

        // Clear any previous output
        if (ob_get_level()) {
            ob_end_clean();
        }

        // Set headers for inline viewing
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Length: ' . $file_size);
        header('Cache-Control: public, max-age=86400');
        header('X-Content-Type-Options: nosniff');

        readfile($file_path);
        exit;
    }

    public function sop()
    {
        $this->load->view('auth/sop');
    }

    public function sejarah()
    {
        $this->load->view('auth/sejarah');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('login');
    }
}
