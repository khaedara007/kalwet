<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkematian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tabel_surat_kematian')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tabel_surat_kematian', ['id' => $id])->row();
    }

    public function get_with_penandatangan($id)
    {
        $this->db->select('tabel_surat_kematian.*, p.jabatan, p.nama as nama_penandatangan, p.nip');
        $this->db->from('tabel_surat_kematian');
        $this->db->join('tabel_penandatangan p', 'p.id = tabel_surat_kematian.penandatangan_id');
        $this->db->where('tabel_surat_kematian.id', $id);
        return $this->db->get()->row();
    }

    public function insert($data)
    {
        $this->db->insert('tabel_surat_kematian', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tabel_surat_kematian', $data);
    }

    public function generate_nomor_surat()
    {
        $tahun = date('Y');
        $bulan = date('n');
        $romawi = $this->number_to_romawi($bulan);

        $this->db->select_max('no_urut');
        $this->db->where('tahun', $tahun);
        $result = $this->db->get('tabel_surat_kematian')->row();
        $no_urut = $result->no_urut ? $result->no_urut + 1 : 1;

        return "474.3/{$no_urut}/{$romawi}/{$tahun}";
    }

    public function get_no_urut()
    {
        $tahun = date('Y');
        $this->db->select_max('no_urut');
        $this->db->where('tahun', $tahun);
        $result = $this->db->get('tabel_surat_kematian')->row();
        return $result->no_urut ? $result->no_urut + 1 : 1;
    }

    private function number_to_romawi($number)
    {
        $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        $result = '';
        foreach ($map as $roman => $int) {
            while ($number >= $int) {
                $result .= $roman;
                $number -= $int;
            }
        }
        return $result;
    }
}
