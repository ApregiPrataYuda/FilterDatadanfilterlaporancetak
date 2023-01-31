<?php

 function cek_akses($status_kat)
  {
    $ci =  get_instance();

    $ci->db->where('status_kat',$status_kat);
    // $ci->db->where('menu_id',$menu_id);
   $result =  $ci->db->get('product_kat');

   if ($result->num_rows() == 1) {
     return "checked = 'checked'";
   }
}