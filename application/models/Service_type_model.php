<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_type_model extends CI_Model {
    protected $table = 'service_types';

    public function get_active()
    {
        return $this->db->where('is_active',1)->get($this->table)->result();
    }
}
