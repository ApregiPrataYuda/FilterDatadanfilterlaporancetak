<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uploads_m extends CI_Model {


    public function get()
    {
       return $this->db->query("SELECT * FROM upload")->result();
    }


    public function geti($id)
    {
      $queryedit =  $this->db->query("SELECT * FROM upload WHERE id = '$id'");
      return  $queryedit;
    }

   public function add($post)
   {
     $params = [
         'name' => $post['name'],
         'ket' => $post['ket'],
         'image' => $post['image']
     ];
    //  var_dump($params); die();
     $this->db->insert('upload',$params);
   }



   public function edit($post)
    {
        $params =[
            'name' => $post['name'],
            'ket' => $post['ket']
          
        ];
           if($post['image'] != null) {
             $params['image'] = $post['image'];
       }
     ;
          $this->db->where('id',  $post['id']);
          $this->db->update('upload', $params);
    }
    

    public function getedit($id = null)
    {
      $this->db->from('upload');
      if ($id != null) {
        $this->db->where('id', $id);
      }
      $query = $this->db->get();
      return  $query;
    }

    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('upload');
    }

}