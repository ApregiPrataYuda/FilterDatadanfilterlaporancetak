<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_page extends CI_Controller {

	public function index()
	{
		$this->template->load('template','page_user');
	}
}
