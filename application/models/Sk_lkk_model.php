<?php
// ============================================================
// FILE: application/models/Sk_lkk_model.php
// ============================================================

defined('BASEPATH') or exit('No direct script access allowed');

class Sk_lkk_model extends CI_Model
{

    protected $table = 'sk_lkk';
    protected $table_history = 'sk_lkk_history';

    /**
     * Ambil semua data SK (aktif saja)
     */
    public function get_all()
    {
        $this->db->where('status', 'aktif');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);

        // Cek apakah kolom jenis_lkk ada
        $fields = $this->db->list_fields($this->table);
        $has_jenis_lkk = in_array('jenis_lkk', $fields);

        $result = $query->result();

        // Jika kolom tidak ada, set default
        if (!$has_jenis_lkk) {
            foreach ($result as $sk) {
                $sk->jenis_lkk = 'rt'; // default
            }
        }

        foreach ($result as $sk) {
            $sk->history = $this->get_history($sk->id);
        }

        return $result;
    }

    /**
     * Ambil SK berdasarkan ID
     */
    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    /**
     * Ambil SK berdasarkan jenis
     */
    public function get_by_jenis($jenis)
    {
        $this->db->where('jenis_lkk', $jenis);
        $this->db->where('status', 'aktif');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        $result = $query->result();

        foreach ($result as $sk) {
            $sk->history = $this->get_history($sk->id);
        }

        return $result;
    }

    /**
     * Cek apakah sudah ada SK dengan jenis dan nomor tertentu
     */
    public function get_by_jenis_nomor($jenis, $nomor_sk)
    {
        return $this->db->get_where($this->table, array(
            'jenis_lkk' => $jenis,
            'nomor_sk' => $nomor_sk
        ))->row();
    }

    /**
     * Ambil history perubahan SK
     */
    public function get_history($sk_lkk_id)
    {
        $this->db->where('sk_lkk_id', $sk_lkk_id);
        $this->db->order_by('versi', 'DESC');
        return $this->db->get($this->table_history)->result();
    }

    /**
     * Arsipkan SK lama ke history sebelum diupdate
     */
    public function archive_to_history($sk_lkk_id)
    {
        $sk = $this->get_by_id($sk_lkk_id);

        if ($sk) {
            $data = array(
                'sk_lkk_id' => $sk->id,
                'jenis_lkk' => $sk->jenis_lkk,
                'nomor_sk' => $sk->nomor_sk,
                'periode_mulai' => $sk->periode_mulai,
                'periode_selesai' => $sk->periode_selesai,
                'keterangan' => $sk->keterangan,
                'file_name' => $sk->file_name,
                'file_path' => $sk->file_path,
                'file_size' => $sk->file_size,
                'versi' => $sk->versi,
                'uploaded_by' => $sk->uploaded_by,
                'created_at' => $sk->created_at
            );

            $this->db->insert($this->table_history, $data);
        }
    }

    /**
     * Insert SK baru
     */
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update SK
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Hapus SK (cascade ke history via FK)
     */
    public function delete($id)
    {
        return $this->db->delete($this->table, array('id' => $id));
    }

    /**
     * Hitung total SK
     */
    public function count_all()
    {
        return $this->db->count_all($this->table);
    }

    /**
     * Hitung SK berdasarkan status
     */
    public function count_by_status($status)
    {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Hitung total history/perubahan
     */
    public function count_history()
    {
        return $this->db->count_all($this->table_history);
    }

    /**
     * Ambil tanggal upload terakhir
     */
    public function get_latest_date()
    {
        $this->db->select_max('created_at');
        $query = $this->db->get($this->table);
        $result = $query->row();

        if ($result && $result->created_at) {
            return date('d M Y', strtotime($result->created_at));
        }
        return '-';
    }
}
