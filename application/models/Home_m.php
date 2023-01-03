<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {

    public function getchart()
    {
      return $this->db->query("SELECT COUNT(tanggal) AS tgl  FROM filter WHERE YEAR(tanggal) = '2022' ")->result();
    }
}