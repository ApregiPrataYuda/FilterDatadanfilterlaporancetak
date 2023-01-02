<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter_models extends CI_Model {

	public function ambilTahun()
	{
        return $this->db->query("SELECT YEAR(tanggal) AS thn FROM filter GROUP BY  YEAR(tanggal)")->result();
	}

    public function ambilBulan()
	{
        return $this->db->query("SELECT MONTH(tanggal) AS bln FROM filter GROUP BY  MONTH(tanggal)")->result();
	}


    public function tampildata($bulan,$tahun)
    {
        $query =  $this->db->query("SELECT tanggal, name, keterangan FROM filter WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' GROUP BY id");
        return $query;
    }

    public function export()
    {
        return $this->db->query("SELECT * FROM filter ORDER BY tanggal ASC")->result();
    }

    
}
