<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class file extends CI_Controller {


    function __construct(){
        parent::__construct();
        $this->load->model('files_m');
    }
	
	public function index()
	{
        $data['row'] = $this->files_m->get();
		$this->template->load('Template','file/file_data',$data);
	}

    public function add()
    {

         //setting rules validasi pada input file name FileUpload
         $this->form_validation->set_rules('name', 'name', 'required');
         $this->form_validation->set_rules('ket', 'ket', 'required');
         $this->form_validation->set_rules('file', 'file', 'callback_validate_files'); 
         // $this->form_validation->set_message('callback', '{field} gagal?');
         $this->form_validation->set_message('required', '{field} kosong?');
         $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
 

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->template->load('Template','file/file_add');
        }else{

            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 2097152;
            $config['file_name']            = 'files-'.date('ymd').'-'.substr(md5(rand()),0,10);
    
            $this->load->library('upload', $config);
    
           $post =  $this->input->post(null, true);
    
            //--step satu
           if (isset($_POST['add'])) {
           
             //--step dua
            if (@$_FILES['file']['name']) {
    
                //--step tiga
               if ($this->upload->do_upload('file')) {
    
                //--step 4
                $post['file']= $this->upload->data('file_name');
    
                //--logic
                $this->files_m->add($post);
                if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                   }
                  redirect('file'); 
                                     }else {
                                            $error = $this->upload->display_errors();
                                            $this->session->set_flashdata('error',$error);
                                            redirect('file'); 
                                          }
               }
            }
            $this->template->load('Template','file/file_add');
        }

        
       }



       //validasi image
    public function validate_files()
    {
        $check = TRUE;
        if ((!isset($_FILES['file'])) || $_FILES['file']['size'] == 0) {
            $this->form_validation->set_message('validate_files', 'The {field} field is required');
            $check = FALSE;
        } else if (isset($_FILES['file']) && $_FILES['file']['size'] != 0) {
            $allowedExts = array("pdf");
            // $allowedTypes = array('.doc','.docx','.xlsx','xls','application/pdf', 'application/msword');
            $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            // $detectedType = exif_filetype($_FILES['file']['tmp_name']);
            $type = $_FILES['file']['type'];

            // if (!in_array($type, $allowedTypes)) {
            //     $this->form_validation->set_message('validate_files', 'Invalid file Content!');
            //     $check = FALSE;
            // }

            if (filesize($_FILES['file']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_files', 'file Minimal 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_files', "File Extension {$extension} Tidak Valid");
                $check = FALSE;
            }
        }
        return $check;
    }

    }

