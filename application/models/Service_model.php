<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service_model extends CI_Model
{
    protected $table = 'service_requests';

    public function create_request($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_by_user($user_id)
    {
        $this->db->select('service_requests.*,service_types.service_name');
        $this->db->join('service_types', $this->table . '.service_type = service_types.service_code');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('submitted_at', 'desc');
        return $this->db->get($this->table)->result();
    }

    public function get_all($filters = [])
    {
        if (!empty($filters['status'])) {
            $this->db->where('status', $filters['status']);
        }
        return $this->db->order_by('submitted_at', 'desc')->get($this->table)->result();
    }

    public function update_status($id, $status, $notes = null)
    {
        $data = ['status' => $status, 'updated_at' => date('Y-m-d H:i:s')];
        if ($notes !== null) $data['revision_notes'] = $notes;
        if ($status === 'completed') $data['completed_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', $id)->update($this->table, $data);
    }

    public function update_completed($id, $file)
    {
        $this->db->where('id', $id)->update($this->table, ['completed_document' => $file, 'updated_at' => date('Y-m-d H:i:s')]);
    }
}
