<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function index()
	{
		$this->template->load('template','Data/Data');
	}


    public function create() {
        $name = $this->input->post('name');
        $message = $this->input->post('message');
        $age = $this->input->post('age');

        $data = array(
            'name' => $name,
            'message' => $message,
            'age' => $age,
        );
        $this->load->model('ajax_model');
        $insert = $this->ajax_model->createData($data);
        echo json_encode($insert);
    }
}
