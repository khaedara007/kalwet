<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penandatangan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        return $this->db->get('tabel_penandatangan')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('tabel_penandatangan', ['id' => $id])->row();
    }
}
