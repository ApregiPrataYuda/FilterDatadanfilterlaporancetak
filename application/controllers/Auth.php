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
			'word'          => substr(strtolower(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')), 0, 5),
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
  
	    $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_message('max_length', '{field} Maximal 8 Karakter...');
        $this->form_validation->set_message('min_length', '{field} Minimal 8 Karakter...');
        $this->form_validation->set_message('numeric', '{field} Harus Angka...');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {
	

	$vals = [
		// 'word' -> nantinya akan digunakan sebagai random teks yang akan keluar di captchanya
		'word'          => substr(strtolower(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')), 0, 5),
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

  }else {
	
	//ambil inputan dari user
    $post_code  = $this->input->post('captcha');
	//set captcha
    $captcha    = $this->session->userdata('captcha');
    //jika inputan dan code captcha sama  maka lolos
    if ($post_code && ($post_code == $captcha)){

        //ambil inputan username
		$username = $this->input->post('username');
		 //ambil inputan password
		$password = $this->input->post('password');
		//cek username dari db
		$checkusername = $this->Authmodels->checkusername($username);
		//jika username ada
		if ($checkusername->num_rows() > 0) {

			//cek password dan
			//cek username dan password apakah sesuai
			$cekussandpass = $this->Authmodels->cekussandpass($username, $password);

			//Jika username dan password sesuai
			if ($cekussandpass->num_rows() > 0) {
				
				 // ambil semua data username dan pass yang ada 
				 $getallfield = $cekussandpass->row_array();

				//ambil field user_status
            //jika user statusnya aktif maka boleh masuk
			if ($getallfield['user_status'] == 1) {

				 //buat session untuk mencegah masuk lewat url
				 $this->session->set_userdata('locked', TRUE);
				 //deklarasi
				 $this->session->set_userdata('user', $username);
				 //deklarasi id
				 $id = $getallfield['user_id'];
				 //jika user akses == 1 redirect ke Dsb
				 if ($getallfield['user_akses'] == 1) {
                  
					$name =  $getallfield['nama_user'];
					$usernames =  $getallfield['username'];
					$this->session->set_userdata('access', 'Admin');
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('nama', $name);
					$this->session->set_userdata('username', $usernames);
					 redirect('Home');

				 //jika user akses == 2 redirect ke pg_user
				 }elseif ($getallfield['user_akses'] == 2) {
					
					$name =  $getallfield['nama_user'];
					$usernames = $getallfield['username'];
					$this->session->set_userdata('access','User');
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('nama', $name);
					$this->session->set_userdata('username', $usernames);
					redirect('User_page');

				 }elseif ($getallfield['user_akses'] == 3) {
					
					$name =  $getallfield['nama_user'];
					$usernames = $getallfield['username'];
					$this->session->set_userdata('access','User');
					$this->session->set_userdata('id', $id);
					$this->session->set_userdata('nama', $name);
					$this->session->set_userdata('username', $usernames);
					redirect('Page_user_biasa');
				 }
				 else {

					//jika user akses == 0
					$this->session->set_flashdata('error','Halaman Tidak Di Temukan');
                    redirect('Auth/login');
				 }

				
			}else {
				//jika user status == 0
				$this->session->set_flashdata('error','Akun Belum Aktif');
               redirect('Auth/login');
			}

			}else {
				//jika username dan password tidak sesuai
				$this->session->set_flashdata('error','password atau username salah');
		        redirect('Auth/Login');
			}

		}else {
		//jika username tidak ada
		$this->session->set_flashdata('error','username tidak tersedia');
		redirect('Auth/Login');
		}
    //batas agar kode berjalan tidak berebnturan dengan else if punya captcha
	die();

	//jika inputan captcha kosong
	}elseif ($post_code == NULL) {
		$this->session->set_flashdata('error','Captcha Masih Kosong');
		redirect('Auth/Login');
	}
	//inputan captcha salah
	else
	$this->session->set_flashdata('error','captcha salah');
	redirect('Auth/Login');
  }


  }

  function logout()
  {
	  $this->session->sess_destroy();
	  redirect('Auth/Login');
  }




  public function register()
  {
	$this->load->view('register');
  }
}



