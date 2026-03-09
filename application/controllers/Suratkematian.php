<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkematian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Suratkematian_model');
        $this->load->model('Penandatangan_model');
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
        $data['title'] = 'Surat Keterangan Kematian';
        $data['surat'] = $this->Suratkematian_model->get_all();
        $this->load->view('admin/surat_kematian/index', $data);
    }

    public function create()
    {
        $this->check_admin();

        $this->load->model('Penandatangan_model'); // Pastikan ini ada

        $data['title'] = 'Buat Surat Kematian';
        $data['penandatangan'] = $this->Penandatangan_model->get_all(); // Pastikan ini ada
        $data['nomor_surat'] = $this->Suratkematian_model->generate_nomor_surat();

        $this->load->view('admin/surat_kematian/create', $data);
    }

    public function store()
    {
        $this->check_admin();

        // Validasi
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_meninggal', 'Nama Almarhum', 'required');
        $this->form_validation->set_rules('nik_meninggal', 'NIK Almarhum', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('hari_meninggal', 'Hari Meninggal', 'required');
        $this->form_validation->set_rules('tanggal_meninggal', 'Tanggal Meninggal', 'required');
        $this->form_validation->set_rules('tempat_meninggal', 'Tempat Meninggal', 'required');
        $this->form_validation->set_rules('penyebab_kematian', 'Penyebab Kematian', 'required');
        $this->form_validation->set_rules('nama_pelapor', 'Nama Pelapor', 'required');
        $this->form_validation->set_rules('nik_pelapor', 'NIK Pelapor', 'required');
        $this->form_validation->set_rules('umur_pelapor', 'Umur Pelapor', 'required|numeric');
        $this->form_validation->set_rules('pekerjaan_pelapor', 'Pekerjaan Pelapor', 'required');
        $this->form_validation->set_rules('alamat_pelapor', 'Alamat Pelapor', 'required');
        $this->form_validation->set_rules('hubungan_pelapor', 'Hubungan Pelapor', 'required');
        $this->form_validation->set_rules('penandatangan_id', 'Penandatangan', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/suratkematian/create');
        }

        $data = array(
            'nomor_surat' => $this->Suratkematian_model->generate_nomor_surat(),
            'no_urut' => $this->Suratkematian_model->get_no_urut(),
            'tahun' => date('Y'),
            'nama_meninggal' => $this->input->post('nama_meninggal'),
            'nik_meninggal' => $this->input->post('nik_meninggal'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'umur' => $this->input->post('umur'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'hari_meninggal' => $this->input->post('hari_meninggal'),
            'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
            'tempat_meninggal' => $this->input->post('tempat_meninggal'),
            'penyebab_kematian' => $this->input->post('penyebab_kematian'),
            'nama_pelapor' => $this->input->post('nama_pelapor'),
            'nik_pelapor' => $this->input->post('nik_pelapor'),
            'umur_pelapor' => $this->input->post('umur_pelapor'),
            'pekerjaan_pelapor' => $this->input->post('pekerjaan_pelapor'),
            'alamat_pelapor' => $this->input->post('alamat_pelapor'),
            'hubungan_pelapor' => $this->input->post('hubungan_pelapor'),
            'penandatangan_id' => $this->input->post('penandatangan_id'),
            'created_by' => $this->session->userdata('user')->id
        );

        $id = $this->Suratkematian_model->insert($data);

        if ($id) {
            $this->session->set_flashdata('success', 'Surat berhasil dibuat!');
            redirect('admin/suratkematian/pdf/' . $id);
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data!');
            redirect('admin/suratkematian/create');
        }
    }

    public function pdf($id = NULL)
    {
        $this->check_admin();

        if ($id === NULL) {
            show_404();
        }

        $surat = $this->Suratkematian_model->get_with_penandatangan($id);

        if (!$surat) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan!');
            redirect('admin/suratkematian');
        }

        $data['surat'] = $surat;
        $data['tanggal_meninggal_formatted'] = $this->format_tanggal($surat->tanggal_meninggal);
        $data['tanggal_cetak_formatted'] = $this->format_tanggal(date('Y-m-d'));

        // Load DOMPDF manual
        require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

        // Buat PDF
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'times');

        $dompdf = new \Dompdf\Dompdf($options);

        $html = $this->load->view('admin/surat_kematian/pdf_template', $data, TRUE);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('Surat_Kematian_' . $surat->nama_meninggal . '.pdf', array('Attachment' => false));
        exit();
    }

    private function format_tanggal($tgl)
    {
        $bulan = array(
            1 => 'Januar    i',
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
