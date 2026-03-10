<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkelahiran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Suratkelahiran_model', 'Penandatangan_model'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'date'));
    }

    protected function check_admin()
    {
        $user = $this->session->userdata('user');
        if (!$user || $user->role !== 'admin') {
            redirect('adminauth');
        }
        return $user;
    }

    public function index()
    {
        $this->check_admin();
        $data['title'] = 'Surat Keterangan Kelahiran';
        $data['surat'] = $this->Suratkelahiran_model->get_all();
        $this->load->view('admin/surat_kelahiran/index', $data);
    }

    public function create()
    {
        $this->check_admin();
        $data['title'] = 'Buat Surat Kelahiran';
        $data['penandatangan'] = $this->Penandatangan_model->get_all();
        $data['nomor_surat'] = $this->Suratkelahiran_model->generate_nomor_surat();
        $data['is_edit'] = false;
        $this->load->view('admin/surat_kelahiran/create', $data);
    }

    public function store()
    {
        $this->check_admin();

        // Validasi
        $this->form_validation->set_rules('nama_bayi', 'Nama Bayi', 'required');
        $this->form_validation->set_rules('jenis_kelamin_bayi', 'Jenis Kelamin Bayi', 'required');
        $this->form_validation->set_rules('hari_lahir', 'Hari Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pukul_lahir', 'Pukul Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('nama_pelapor', 'Nama Pelapor', 'required');
        $this->form_validation->set_rules('hubungan_pelapor', 'Hubungan Pelapor', 'required');
        $this->form_validation->set_rules('penandatangan_id', 'Penandatangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/suratkelahiran/create');
        }

        $data = array(
            'nomor_surat' => $this->Suratkelahiran_model->generate_nomor_surat(),
            'no_urut' => $this->Suratkelahiran_model->get_no_urut(),
            'tahun' => date('Y'),
            'hari_lahir' => $this->input->post('hari_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'pukul_lahir' => $this->input->post('pukul_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'jenis_kelamin_bayi' => $this->input->post('jenis_kelamin_bayi'),
            'nama_bayi' => $this->input->post('nama_bayi'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nik_ibu' => $this->input->post('nik_ibu'),
            'umur_ibu' => $this->input->post('umur_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nik_ayah' => $this->input->post('nik_ayah'),
            'umur_ayah' => $this->input->post('umur_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'alamat_ayah' => $this->input->post('alamat_ayah'),
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'nik_pelapor' => $this->input->post('nik_pelapor'),
            'umur_pelapor' => $this->input->post('umur_pelapor'),
            'pekerjaan_pelapor' => $this->input->post('pekerjaan_pelapor'),
            'alamat_pelapor' => $this->input->post('alamat_pelapor'),
            'hubungan_pelapor' => $this->input->post('hubungan_pelapor'),
            'penandatangan_id' => $this->input->post('penandatangan_id')
        );

        $id = $this->Suratkelahiran_model->insert($data);

        if ($id) {
            $this->session->set_flashdata('success', 'Surat kelahiran berhasil dibuat!');
            redirect('admin/suratkelahiran/pdf/' . $id);
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data!');
            redirect('admin/suratkelahiran/create');
        }
    }

    public function edit($id = NULL)
    {
        $this->check_admin();

        if ($id === NULL) {
            show_404();
        }

        $surat = $this->Suratkelahiran_model->get_by_id($id);

        if (!$surat) {
            $this->session->set_flashdata('error', 'Data surat tidak ditemukan!');
            redirect('admin/suratkelahiran');
        }

        $data['title'] = 'Edit Surat Kelahiran';
        $data['surat'] = $surat;
        $data['penandatangan'] = $this->Penandatangan_model->get_all();
        $data['is_edit'] = true;

        $this->load->view('admin/surat_kelahiran/create', $data);
    }

    public function update($id = NULL)
    {
        $this->check_admin();

        if ($id === NULL) {
            show_404();
        }

        // Validasi sama seperti store
        $this->form_validation->set_rules('nama_bayi', 'Nama Bayi', 'required');
        $this->form_validation->set_rules('jenis_kelamin_bayi', 'Jenis Kelamin Bayi', 'required');
        $this->form_validation->set_rules('hari_lahir', 'Hari Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pukul_lahir', 'Pukul Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'required');
        $this->form_validation->set_rules('nama_pelapor', 'Nama Pelapor', 'required');
        $this->form_validation->set_rules('hubungan_pelapor', 'Hubungan Pelapor', 'required');
        $this->form_validation->set_rules('penandatangan_id', 'Penandatangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/suratkelahiran/edit/' . $id);
        }

        $data = array(
            'hari_lahir' => $this->input->post('hari_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'pukul_lahir' => $this->input->post('pukul_lahir'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'jenis_kelamin_bayi' => $this->input->post('jenis_kelamin_bayi'),
            'nama_bayi' => $this->input->post('nama_bayi'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'nik_ibu' => $this->input->post('nik_ibu'),
            'umur_ibu' => $this->input->post('umur_ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'alamat_ibu' => $this->input->post('alamat_ibu'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nik_ayah' => $this->input->post('nik_ayah'),
            'umur_ayah' => $this->input->post('umur_ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'alamat_ayah' => $this->input->post('alamat_ayah'),
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'nik_pelapor' => $this->input->post('nik_pelapor'),
            'umur_pelapor' => $this->input->post('umur_pelapor'),
            'pekerjaan_pelapor' => $this->input->post('pekerjaan_pelapor'),
            'alamat_pelapor' => $this->input->post('alamat_pelapor'),
            'hubungan_pelapor' => $this->input->post('hubungan_pelapor'),
            'penandatangan_id' => $this->input->post('penandatangan_id')
        );

        if ($this->Suratkelahiran_model->update($id, $data)) {
            $this->session->set_flashdata('success', 'Surat kelahiran berhasil diupdate!');
            redirect('admin/suratkelahiran/pdf/' . $id);
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate data!');
            redirect('admin/suratkelahiran/edit/' . $id);
        }
    }

    public function delete($id = NULL)
    {
        $this->check_admin();

        if ($id === NULL) {
            show_404();
        }

        if ($this->Suratkelahiran_model->delete($id)) {
            $this->session->set_flashdata('success', 'Surat kelahiran berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data!');
        }

        redirect('admin/suratkelahiran');
    }

    public function pdf($id = NULL)
    {
        $this->check_admin();

        if ($id === NULL) {
            show_404();
        }

        $surat = $this->Suratkelahiran_model->get_with_penandatangan($id);

        if (!$surat) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin/suratkelahiran');
        }

        $data['surat'] = $surat;
        $data['tanggal_lahir_formatted'] = $this->format_tanggal($surat->tanggal_lahir);
        $data['tanggal_cetak_formatted'] = $this->format_tanggal(date('Y-m-d'));

        // Load DOMPDF
        if (file_exists(FCPATH . 'vendor/autoload.php')) {
            require_once FCPATH . 'vendor/autoload.php';
        } else {
            require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
        }

        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new \Dompdf\Dompdf($options);

        $html = $this->load->view('admin/surat_kelahiran/pdf_template', $data, TRUE);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('Surat_Kelahiran_' . $surat->nama_bayi . '.pdf', array('Attachment' => false));
        exit();
    }

    private function format_tanggal($tgl)
    {
        $bulan = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        $d = explode('-', $tgl);
        return (int)$d[2] . ' ' . $bulan[(int)$d[1]] . ' ' . $d[0];
    }
}
