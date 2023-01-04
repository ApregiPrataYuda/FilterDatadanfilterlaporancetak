<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class files_m extends CI_Model {

    public function get()
    {
       return $this->db->query("SELECT * FROM files")->result();
    }

    public function add($post)
    {
      $params = [
          'name' => $post['name'],
          'ket' => $post['ket'],
          'file' => $post['file']
      ];
   
      $this->db->insert('files',$params);
    }
 
}