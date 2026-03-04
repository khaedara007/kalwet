<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = 'users';

    public function create_user($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('users');
    }

    public function get_by_phone($phone)
    {
        return $this->db->where('phone', $phone)->get($this->table)->row();
    }

    public function get_by_nik($nik)
    {
        return $this->db->where('nik', $nik)->get($this->table)->row();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function get_pending()
    {
        return $this->db->where('status', 'pending')->get($this->table)->result();
    }

    public function update_status($id, $status)
    {
        $this->db->where('id', $id)->update($this->table, ['status' => $status, 'updated_at' => date('Y-m-d H:i:s')]);
    }

    public function get_all()
    {
        return $this->db->order_by('created_at', 'desc')->get($this->table)->result();
    }
}
