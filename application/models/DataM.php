<?php
class DataM extends CI_Model 
{
	public function createData($data) {
        $query = $this->db->insert('ajx', $data);
        return $query;
    }
}

