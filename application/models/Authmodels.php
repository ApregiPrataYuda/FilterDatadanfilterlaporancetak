<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authmodels extends CI_model {

	public function checkusername($username)
	{
		$result =  $this->db->query("SELECT * FROM tk_user WHERE username = '$username' LIMIT 1");
        return $result;
	}
}
