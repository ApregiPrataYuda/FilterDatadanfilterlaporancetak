<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Home_m');
	}


	public function index()
	{
		$data['row'] = $this->Home_m->getchart();
		$this->template->load('Template','Home',$data);
	}
}
