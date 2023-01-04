<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploads extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('uploads_m');
    }

	public function index()
	{
        $data['row'] = $this->uploads_m->get();
		$this->template->load('Template','uploads/uploads', $data);
	}

    // public function add()
    // {

    //     $config['upload_path']          = './assets/uploads/';
    //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
    //     $config['max_size']             = 2048;
    //     $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

    //     $this->load->library('upload', $config);

    //     $post =  $this->input->post(null, TRUE);

    //     if (isset($_POST['add'])) {
    //         if (@$_FILES['image']['name']) {
               
    //             if ($this->upload->do_upload('image'))
    //                 {
    //                    $post['image']= $this->upload->data('file_name');
    //                     $this->uploads_m->add($post);
    //                     if ($this->db->affected_rows() > 0) {
    //                     $this->session->set_flashdata('pesan', 'data berhasil di simpan');
    //                        }
    //                       redirect('uploads'); 
    //                                          }else {
    //                                                 $error = $this->upload->display_errors();
    //                                                 $this->session->set_flashdata('error',$error);
    //                                                 redirect('uploads'); 
    //                                               }
    //         }
    //     }
    //     $this->template->load('Template','uploads/uploads_add');
    // }


    public function add()
    {
        //setting rules validasi pada input file name FileUpload
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');
        $this->form_validation->set_rules('image', 'image', 'callback_validate_image'); 
        // $this->form_validation->set_message('callback', '{field} gagal?');
        $this->form_validation->set_message('required', '{field} kosong?');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->template->load('Template','uploads/uploads_add');
        }else{
         
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2097152;
        $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);
        $post =  $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name']) {
                if ($this->upload->do_upload('image'))
                    {
                       $post['image']= $this->upload->data('file_name');
                        $this->uploads_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                           }
                          redirect('uploads'); 
                                             }else {
                                                    $error = $this->upload->display_errors();
                                                    $this->session->set_flashdata('error',$error);
                                                    redirect('uploads'); 
                                                  }
            }
        }
        $this->template->load('Template','uploads/uploads_add');
        }
    }



    public function edit($id)
    {
      
        //setting rules validasi pada input file name FileUpload
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');
        $this->form_validation->set_rules('image', 'image', 'callback_validate_image'); 
        $this->form_validation->set_message('callback', '{field} gagal?');
        $this->form_validation->set_message('required', '{field} kosong?');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if ($this->form_validation->run() == FALSE) {
            # code...
            $query = $this->uploads_m->geti($id);
            if ($query->num_rows() > 0 ) {
               $rowx = $query->row();
               $data = array('row' =>  $rowx, );
               $this->template->load('Template','uploads/uploads_edit',$data);
        }else {
            $this->process_edit();
        }
    }
}


   public function process_edit()
    {
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2097152;
        $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);
        $post =  $this->input->post(null, TRUE);
      if (isset($_POST['edit'])) {

        if (@$_FILES['image']['name']) {

            if ($this->upload->do_upload('image')) {

                $oldimg = $this->uploads_m->getedit($post['id'])->row();
                                               if ($oldimg->image) {
                                                   $target_file = './assets/uploads/'.$oldimg->image;
                                                   unlink( $target_file);
                                               }


                     $post['image']= $this->upload->data('file_name');
                                                $this->uploads_m->edit($post);
                                              if ($this->db->affected_rows() > 0) {
                                                   $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                                             }
                                                redirect('uploads'); 
            }
      }else {
        $post[image]= null;
         $this->uploads_m->edit($post);
         if ($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('pesan', 'data berhasil di update');
    }
       redirect('uploads');
}               
    }       
    }


    
    //validasi image
    public function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['image'])) || $_FILES['image']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} field is required');
            $check = FALSE;
        } else if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
            $type = $_FILES['image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['image']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_image', 'Image Minimal 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "File Extension {$extension} Tidak Valid");
                $check = FALSE;
            }
        }
        return $check;
    }



    public function delete($id)
    {
        $oldimg = $this->uploads_m->getedit($id)->row();
        if ($oldimg->image) {
            $target_file = './assets/uploads/'.$oldimg->image;
            unlink( $target_file);
        }

      $this->uploads_m->delete($id);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', 'data berhasil di hapus');
      }
      redirect('uploads');
    }

}



