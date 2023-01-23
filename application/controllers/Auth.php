<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Authmodels');
	}

	public function login()
	{
		$vals = [
			// 'word' -> nantinya akan digunakan sebagai random teks yang akan keluar di captchanya
			'word'          => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5),
			'img_path'      => './assets/images/captcha/',
			'img_url'       => base_url('assets/images/captcha/'),
			'img_width'     => 150,
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 5,
			'font_size'     => 50,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'        => [
                'background'=> [255, 255, 255],
                'border'    => [255, 255, 255],
                'text'      => [0, 0, 0],
                'grid'      => [9, 58, 255]
        ]
		];
		
		$captcha = create_captcha($vals);
		$this->session->set_userdata('captcha', $captcha['word']);

		$this->load->view('Login',['captcha' => $captcha['image']]);
	}





	public function process() 
{
    $post_code  = $this->input->post('captcha');
    $captcha    = $this->session->userdata('captcha');
    
    if ($post_code && ($post_code == $captcha)){

        // $this->session->set_flashdata('pesan_form', '<font style="color: green"><b>Berhasil memverifikasi captcha.</b></font><br/><br/>');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$checkusername = $this->Authmodels->checkusername($username);

		// var_dump($checkusername[0]->username); die();

		if ($checkusername->num_rows() > 0) {
			echo 'username ada';
		}else {
			echo 'success';
		}

	}elseif ($post_code == NULL) {
		$this->session->set_flashdata('pesan_form', '<font style="color: red"><b>Captcha Tidak Boleh Kosong!</b></font><br/><br/>');
		redirect('Auth/Login');
	}
	else
        $this->session->set_flashdata('pesan_form', '<font style="color: red"><b>Captcha yang Anda ketik salah!</b></font><br/><br/>');
		redirect('Auth/Login');
  }
}

