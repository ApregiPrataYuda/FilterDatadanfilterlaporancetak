<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class kirim_email extends CI_Controller {

    
    public function __construct()
 {
   parent::__construct(); 
   require APPPATH.'libraries/phpmailer/src/Exception.php';
   require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
   require APPPATH.'libraries/phpmailer/src/SMTP.php';
 }

	public function index()
	{
		$this->template->load('Template','kirim_email/kirim_email');
	}


    public function send()
    {
       // PHPMailer object
	  $response = false;
	  $mail = new PHPMailer();
   
	  // SMTP configuration
	  $mail->isSMTP();
	  $mail->Host     = 'smtp.gmail.com';
	  $mail->SMTPAuth = true;
	  $mail->Username = 'tess96956@gmail.com'; // user email anda
	  $mail->Password = 'yijptjqfajlghyqf'; // diisi dengan App Password yang sudah di generate
	  $mail->SMTPSecure = 'ssl';
	  $mail->Port     = 465;
   
	  $mail->setFrom('tess96956@gmail.com', 'Tes.co.id'); // user email anda
	  $mail->addReplyTo('tess96956@gmail.com', ''); //user email anda
   
	  // Email subject
	  $mail->Subject = 'TES KIRIM EMAIL SMTP DENGAN CI3'; //subject email
   
	  // Add a recipient
	  $mail->addAddress($this->input->post('email')); //email tujuan pengiriman email

	//   $mail->AddAttachment("./Pictures/tes.pdf");
   
	  // Set email format to HTML
	  $mail->isHTML(true);
   
	  // Email body content
	  $mailContent = "<p>Hallo <b>".$this->input->post('nama')."</b> KIRIM KIRIM EMAIL SMTP DENGAN CI3:</p>
	  <table>
		<tr>
		  <td>Nama</td>
		  <td>:</td>
		  <td>".$this->input->post('nama')."</td>
		</tr>
		<tr>
		  <td>nik</td>
		  <td>:</td>
		  <td>".$this->input->post('nik')."</td>
		</tr>
		<tr>
		  <td>catatan</td>
		  <td>:</td>
		  <td>".$this->input->post('catatan')."</td>
		</tr>


		
	  </table>
	  <p>Terimakasih <b>".$this->input->post('nama')."</b> telah memberi komentar.</p>"; // isi email

	  
	  $mail->Body = $mailContent;
   
	  // Send email
	  if(!$mail->send()){
		echo 'Pesan Email Terkirim.';
		echo 'Pesan Error: ' . $mail->ErrorInfo;
	  }else{
		echo 'Pesan Email Terkirim.';
	  }
	}

    }
