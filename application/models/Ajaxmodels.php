<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxmodels extends CI_Model {

    public function getdata()
    {
      return $this->db->query("SELECT * FROM product_kat ORDER BY kode_kat DESC")->result();
    }


    public function updateddata($status_kat,$status_id)
    {

        $params = [
                'status_kat' => 'Nonaktif',
                'id'  => $status_id
        ];
         $this->db->update('product_kat',$params);
    }
}