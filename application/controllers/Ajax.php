<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Ajaxmodels');
    }

	public function index()
	{
        $data['row'] = $this->Ajaxmodels->getdata();  
		$this->template->load('template','ajax/ajaxdata',$data);
	}


    public function ubahStatus()
    {
         $status_kat = $this->input->post('statuskat');
         $status_id = $this->input->post('statusid');
       
        
         $data = [
			'status_kat' => $status_kat,
			'id' => $status_id
		];

        $result = $this->db->get_where('product_kat',$data);

        if ($result->num_rows() < 1) {
			$this->db->insert('product_kat',$data);
			$this->session->set_flashdata('pesan', 'Access Di Ubah');
		 }else {
			$this->db->delete('product_kat',$data);
			$this->session->set_flashdata('pesan', 'Access Di Ubah');
		 }
    }
}
