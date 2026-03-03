<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating_model extends CI_Model
{

    protected $table = 'ratings';

    public function __construct()
    {
        parent::__construct();
    }

    // Insert rating baru
    public function insertRating($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Cek apakah user sudah rating
    public function hasUserRated($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    // Get statistik rating
    public function getRatingStats()
    {
        $this->db->select('COUNT(*) as total, AVG(rating) as average');
        $query = $this->db->get($this->table);
        $result = $query->row();

        $distribusi = [];
        for ($i = 1; $i <= 5; $i++) {
            $this->db->where('rating', $i);
            $distribusi[$i] = $this->db->count_all_results($this->table);
        }

        return [
            'total' => $result->total ?? 0,
            'average' => $result->average ? round($result->average, 1) : 0,
            'distribusi' => $distribusi
        ];
    }

    // Ambil semua rating dengan info user (untuk admin)
    public function getAllRatings($limit = 100)
    {
        // PERBAIKAN: u.name (bukan u.nama)
        $this->db->select('r.*, u.name as nama');
        $this->db->from($this->table . ' r');
        $this->db->join('users u', 'u.id = r.user_id', 'left');
        $this->db->order_by('r.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
}
